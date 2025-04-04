let HOST_URL = "https://mmi.unilim.fr/~delage130/SAE2.03-DelageCloe"; //"http://mmi.unilim.fr/~????"; // CHANGE THIS TO MATCH YOUR CONFIG

let DataMovie = {};

DataMovie.requestMovies = async function () {
    let answer = await fetch(HOST_URL + "/server/script.php?todo=readmovies");
    let movies = await answer.json();
    
    return movies;
};

/** DataMenu.update
 * @param {*} movieData un objet FormData contenant les données du formulaire à envoyer au serveur.
 * @returns la réponse du serveur.
 */

DataMovie.addMovies = async function (movieData) {
    let config = {
        method: 'POST',
        body: movieData 
    };
    let answer = await fetch(HOST_URL + "/server/script.php?todo=addmovies", config);
    let data = await answer.json();
    
    return data;
};

export { DataMovie };