const fs = require("fs");
const path = require("path");

const root = path.join(__dirname, "..");
const langs = ["en", "pt", "it", "fr"];

for (const lang of langs) {
  const mainPath = path.join(root, "assets/i18n", `${lang}.json`);
  const extPath = path.join(__dirname, `i18n-pages-${lang}.json`);
  const main = JSON.parse(fs.readFileSync(mainPath, "utf8"));
  const ext = JSON.parse(fs.readFileSync(extPath, "utf8"));
  for (const page of Object.keys(ext)) {
    main.pages[page] = { ...main.pages[page], ...ext[page] };
  }
  fs.writeFileSync(mainPath, JSON.stringify(main, null, 2) + "\n", "utf8");
  console.log("Merged", lang);
}
