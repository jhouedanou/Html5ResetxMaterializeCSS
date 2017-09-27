#HTML 5 Reset x Wordpress x Yaml.de

V4 .

Un thème vierge pour Wordpress, basé sur html5reset et [Yaml.de](http://www.yaml.de/)
# V6
Mise à jour du gulpfile.
une fois le repo téléchargé, faites un **npm install** pour récupérer les fichiers qui permettront à gulp et browser—sync de fonctionner


# v5
une fois le repo téléchargé, faites un **npm install** pour récupérer les fichiers qui permettront à gulp et browser—sync de fonctionner

# V.4
installez directement vos packages avec bower. Les fichiers sont copiés dans le dossier js, vous pouvez modifier cette destination en modifiant le fichier .bowerrc

# V.3
Mise à jour avec Gulp, et plus précisément

* gulp-sass
* gulp-uglify : pour minifier les fichiers dans le dossier js
* gulp-imagemin : minifie les images - à lancer avec **gulp images** 
* gulp browsersync : rechargement automatique lors de la modification des fichiers php et js , ainsi que lors de l'ajout d'images dans le dossier **images/src**

# important 

* Mettre à jour la ligne **84** du fichier **gulpfile.js** avec l'adresse de votre installation locale de Wordpress
* Utilisez Emmet Livestyle ([pourquoi pas ?](http://livestyle.io/)) pour une édition bidirectionnelle des fichiers .scss

Jean Luc Houedanou