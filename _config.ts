import lume from "https://deno.land/x/lume/mod.ts";
import date from "https://deno.land/x/lume/plugins/date.ts";
import postcss from "https://deno.land/x/lume/plugins/postcss.ts";
import terser from "https://deno.land/x/lume/plugins/terser.ts";
import codeHighlight from "https://deno.land/x/lume/plugins/code_highlight.ts";
import basePath from "https://deno.land/x/lume/plugins/base_path.ts";
import slugifyUrls from "https://deno.land/x/lume/plugins/slugify_urls.ts";
import resolveUrls from "https://deno.land/x/lume/plugins/resolve_urls.ts";
import gpm from "https://deno.land/x/gpm@v0.2.0/mod.ts";

const site = lume({
  location: new URL("https://exceptionless.com/"),
  src: "content",
});

site
  .ignore("README.md")
  .copy("assets")
  .use(postcss())
  .use(terser())
  .use(date())
  .use(codeHighlight())
  .use(basePath())
  .use(slugifyUrls({ alphanumeric: false }))
  .use(resolveUrls())
  .addEventListener(
    "beforeBuild",
    () => gpm(["oom-components/searcher"], "content/assets/js"),
  );

export default site;

if (import.meta.main) site.build();