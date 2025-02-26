let fs = require('fs');
let srcFiles = [];

//<beginFold> readFileContents Promise
function readFileContents(fileSrc){
  return new Promise(function(resolve, reject) {
    fs.readFile(fileSrc, 'utf8', function(err, contents) {
      if(err != "" && err != undefined){
        console.log(err);
      }
      resolve(contents);
    });
  }); // end return Promise
}
//</endFold>

//<beginFold> read scripts src from index.html
readFileContents('src/edit_runtime/init_Runtime.js').then(function(content){

  let tracker = 0;
  let subContent = content;
  for(var i=0; i<25; i++){
    var srcStart = subContent.indexOf('REPLACE {') + 9;
    subContent = subContent.substring(srcStart, subContent.length);
    var srcEnd = subContent.indexOf('};');
    var src = subContent.substring(0, srcEnd);
    if(src == ""){ break; }
    srcFiles.push(src)
  }


  var promiseAll = [];
  for(var i=0; i<srcFiles.length; i++){
    promiseAll.push( readFileContents('src/edit_runtime/'+srcFiles[i]+'.js') );
  }

  var newCode = content;
  Promise.all(promiseAll).then(function(allFiles) {
    for(var i=0; i<allFiles.length; i++){
      newCode = newCode.replace('REPLACE {' +srcFiles[i] +'};', allFiles[i]);
    }

    fs.writeFile('src/compiled.js', newCode, (err) => {
      console.log(err);
		});

  });

});
//</endFold>
