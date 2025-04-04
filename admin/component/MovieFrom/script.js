

let templateFile = await fetch('./component/MovieFrom/template.html');
let template = await templateFile.text();


let MovieFrom = {};

MovieFrom.format = function(handlerAddMovie){
    let html= template;
    html = html.replace('{{handlerAddMovie}}', handlerAddMovie);
    return html;
}


export {MovieFrom};


