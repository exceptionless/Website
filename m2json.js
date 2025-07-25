/* eslint-env node */
'use strict';

import { DateTime } from 'luxon';
import path from 'path';
import fs from 'fs';
import yaml from 'yaml-front-matter';

// Side effects:
// - Root node of JSON is files key mapping to a dictionary of files
// - .preview will be first WIDTH characters of the raw content
//   (not translated), if width is not 0
// - .__content is removed (potentially too large)
// - if .date is detected, a formated date is added as .dateFormatted

const truncate = function(str, options) {
  const { length = 80, separator = /\s/, omission = ' …' } = options;
  
  if (str.length <= length) {
    return str;
  }
  
  let truncated = str.slice(0, length);
  if (separator) {
    const lastIndex = truncated.search(separator);
    if (lastIndex > 0) {
      truncated = truncated.slice(0, lastIndex);
    }
  }
  
  return truncated + omission;
};

const processFile = function(filename, width, content) {
  const _basename = path.basename(filename, path.extname(filename));

  const contents = fs.readFileSync(filename, {encoding: 'utf-8'});
  const _metadata = yaml.loadFront(contents);

  // If width is truthy (is defined and and is not 0).
  if (width) {
    // Max of WIDTH chars snapped to word boundaries, trim whitespace
    const truncateOptions = {
      length: width,
      separator: /\s/,
      omission: ' …',
    };
    _metadata.preview = truncate(_metadata['__content'].trim(),
        truncateOptions);
  }

  // If the option is provided keep the entire content in field 'content'
  if (typeof(content) != 'undefined') {
    _metadata['content'] = _metadata['__content'];
  }

  delete _metadata['__content'];

  // map user-entered date to a better one using DateTime's parser
  if (_metadata.date) {
    _metadata.iso8601Date = DateTime.fromJSDate(new Date(_metadata.date)).toISO();
  }

  _metadata.basename = _basename;
  _metadata.path = filename;

  return {
    metadata: _metadata,
    basename: _basename,
  };
};

const getFiles = function(filename) {
  if (fs.lstatSync(filename).isDirectory()) {
    return fs.readdirSync(filename).filter((entry) => !entry.isDirectory);
  } else {
    return [filename];
  }
};

export const parse = function(filenames, options) {
  // http://i.qkme.me/3tmyv8.jpg
  const parseAllTheFiles = {};
  // http://i.imgur.com/EnXB9aA.jpg

  const files = filenames
      .map(getFiles)
      .reduce((collection, filenames) => collection.concat(filenames), []);

  files
      .map((file) => processFile(file, options.width, options.content))
      .forEach((data) => {
        parseAllTheFiles[data.basename] = data.metadata;
      });

  const json = JSON.stringify(parseAllTheFiles, null, options.minify ? 0 : 2);

  if (options.outfile) {
    const file = fs.openSync(options.outfile, 'w+');
    fs.writeSync(file, json + '\n');
    fs.closeSync(file);
    return;
  } else {
    return json;
  }
};

export default { parse };
