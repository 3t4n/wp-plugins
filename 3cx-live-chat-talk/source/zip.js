const AdmZip = require('adm-zip');
const zip = new AdmZip();

["dist"].forEach(folder => zip.addLocalFolder(folder));
zip.writeZip("3cx-click2call-widget.zip");
