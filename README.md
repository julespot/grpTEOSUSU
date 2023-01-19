# Projet Infrastructure et Logiciels

Dépôt production "prod" pour le client Les Logis de Beaulieu.  

## Overview 

Le site web est situé dans le répertoire `Website/`.  
L'application java est situé dans le répertoire `Java/`.  
L'infra est construite autour de 4 VMs suivant ce diagramme :  
<img width="871" alt="Capture d’écran 2023-01-19 à 20 21 13" src="https://user-images.githubusercontent.com/120210590/213539880-bc2b6596-0cae-4895-a8d0-446aa96c72b0.png">


## Description du Labs

Les machines sont reliées à votre machine réelle par un réseau privé hôte

* Le site web est accéssible par l'adresse <https://192.168.56.80>


Activer toutes les VMs
    ```vagrant up```
    
Lancer les scripts de provision sur une VM (reverse-proxy par exemple)
    ```vagrant provision reverse-proxy```

Se connecter à une VM (web1 par exemple)
    ```vagrant ssh web1```

Arréter une VM (db par exemple)
    ```vagrant halt db```

Détruire toutes les VMs (sans demande de confirmation)
    ```vagrant destroy -f```
