import { exec } from 'child_process';
import { program } from 'commander';

program.option('-t, --title <title>', 'Post title');

(() => {
  console.log("creating a new post...");

  try {
    program.parse();
    const options = program.opts();
    if (!options.title) {
      console.log("New post title required");
      process.exit(1);
    }

    const date = new Date();
    const month = date.getMonth() + 1;
    const twoDigitMonth = month.toString().length < 2 ? `0${month.toString()}` : month;
    const day = date.getDate();
    const twoDigitDay = day.toString().length < 2 ? `0${day.toString()}` : day;
    const year = date.getFullYear();

    const titleForFile = options.title.toLowerCase();
    const titleSplit = titleForFile.split(' ').join('-');

    const markdownTitle = `${year}-${twoDigitMonth}-${twoDigitDay}-${titleSplit}.md`

    exec(`
cat <<EOF >./content/news/${year}/${markdownTitle}
---
title: ${options.title}
date: ${year}-${twoDigitMonth}-${twoDigitDay}
draft: true
---
    `, (err, stdout, stderr) => {
      if(err) {
        console.log(err);
        process.exit(1);
      }

      if(stderr) {
        console.log(stderr);
        process.exit(1);
      }

      console.log("New post created");
      process.exit(0);
    })
  } catch (error) {
    console.log(error);
    process.exit(1);
  }
})();