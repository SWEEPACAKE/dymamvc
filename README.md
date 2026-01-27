# Mise en place du projet DymaMVC

## Récupérer le projet 

Se placer dans le répertoire dev/projects/ puis on va cloner le projet
```
git clone https://github.com/SWEEPACAKE/dymamvc.git
```

## Configuration

Préparer ou reprendre le VHOST dymamvc.loc sur votre VM Homestead

**Attention : le Document Root doit pointer vers le dossier public !**

```
vagrant up
```
Si vous aviez déjà le VHOST dymamvc.loc, sinon 

```
vagrant up --provision
```
## Paramétrage
Une fois la VM démarrée, reprendre le fichier config/dump-dymamvc.sql et l'importe dans votre SGBD. 

Éditez ensuite le fichier config/database.php afin d'y reporter les identifiants de connexion. 

## Démarrer

Une fois la VM lancée et la base de donnée créée, vous devriez avoir accès à [http://dymamvc.loc](http://)