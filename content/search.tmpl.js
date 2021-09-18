export const url = "/docs/index.json";
export const renderOrder = 1000;
import lunr from 'https://cdn.skypack.dev/lunr?dts';

export default function ({ search }, { url }) {
  const idx = lunr(function () {
    this.field('title');
    this.field('body');

    for (const post of search.pages("type=doc")) {
      this.add({
        "id": url(post.data.url),
        "title": post.data.title,
        //"description": post.data.description,
        //"tags": post.data.tags.join(" "),
        "body": post.content
      });
    }
  });

  return JSON.stringify(idx);
}
