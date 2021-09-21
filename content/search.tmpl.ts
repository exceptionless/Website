export const url = "/docs/index.json";
export const renderOrder = 1000000;
import lunr from 'https://cdn.skypack.dev/lunr?dts';
import Search from "https://deno.land/x/lume/core/helpers/search.ts";
import { Data } from "https://deno.land/x/lume/core.ts";

export default function (data : Data, blah: any): string {
  const search = data.search as Search;

  const idx = lunr(function () {
    this.field('title');
    this.field('body');

    const pages = search.pages("type=doc", "parent.src.path data.order");

    for (const post of search.pages("type=doc")) {
      this.add({
        "id": blah.url(post.data.url),
        "title": post.data.title,
        //"description": post.data.description,
        //"tags": post.data.tags.join(" "),
        "body": post.content
      });
    }
  });

  return JSON.stringify(idx);
}
