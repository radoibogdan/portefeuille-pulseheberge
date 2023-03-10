<?php 
    class Compteur {
        const INCREMENT = 1;
        protected $fichier;
        public function __construct (string $fichier) 
        {
            $this->fichier = $fichier; 
        }

        public function incrementer() : void 
        {
            //verifier si le fichier compteur existe
            $compteur = 1; // écrasé par la vraie valeur si le fichier existe déjà
            if (file_exists($this->fichier)) {
            //si le fichier existe on incremente la variable $compteur
            $compteur = (int)file_get_contents($this->fichier);
            $compteur += static::INCREMENT;
            } 
            //si le fichier existe on stocke la valeur,
            //si le fichier n'existe pas cette fonction crée le fichier
            file_put_contents($this->fichier, $compteur);
        }

        public function recuperer() :int 
        {
            if (!file_exists($this->fichier)) {
                return 0;
            }
            return file_get_contents($this->fichier);
        }

    }
?>