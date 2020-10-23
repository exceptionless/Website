const { exec } = require('child_process');
const { program } = require('commander');
program.option('-t, --title <title>', 'Post title');

(() => {
  try {
    program.parse(process.argv);
    console.log("creating a new post...")
    if(!program.title) {
      console.log("New post title required");
      process.exit(1);
    }
  
    const date = new Date();
    const month = date.getMonth() + 1;
    const day = date.getDate();
    const year = date.getFullYear();
  
    const titleForFile = program.title.toLowerCase();
    const titleSplit = titleForFile.split(' ').join('-');
  
    const markdownTitle = `${year}-${month}-${day}-${titleSplit}.md`
  
    exec(`
      cat <<EOF >./content/news/${year}/${markdownTitle}
      ---
      title: ${program.title}
      date: ${year}-${month}-${day}
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