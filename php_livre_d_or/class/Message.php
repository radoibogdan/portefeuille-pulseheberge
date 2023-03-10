<?php 
   class Message {
        const LIMIT_USERNAME = 3;
        const LIMIT_MESSAGE  = 10;

        private $message;
        private $username;
        private $date;

        /* La seule fonction statique */
        public static function fromJSON(string $json) : Message 
        {
            $data = json_decode($json, true); // true => permet de générer un tableau associatif avec le contenu décodé
            // renvoie un array
            // self => prend automatiquement le nom de la classe
            return new self($data['username'], $data['message'], new DateTime("@" . $data['date'])); 
            // renvoie un objet Message
        }

        public function __construct(string $username, string $message, ?DateTime $date = null)
        {
            $this->username = $username;
            $this->message  = $message;
            $this->date     = $date ?: new DateTime(); // short ternary returns $date if $date = true, else if $date doesn't exist create new DateTime();
        }

        /* valid if username > 3 caractères et message > 10 caractères */
        public function isValid() : bool
        {
            /* return strlen($this->username)>= 3 && strlen($this->message)>=10 ; */
            // getErrors() renvoie un tableau vide si pas d'erreurs 
            return empty($this->getErrors());
        }

        public function getErrors() : array 
        {
            $errors = [];
            if (strlen($this->username)<self::LIMIT_USERNAME) {
                $errors['username'] = 'Votre pseudo est trop court!';
            }
            if (strlen($this->message)<self::LIMIT_MESSAGE) {
                $errors['message'] = 'Votre message est trop court!';
            }
            return $errors;
        }

        public function toHTML() : string 
        {
            $username = htmlentities($this->username);
            $this->date->setTimezone(new DateTimeZone('Europe/Paris'));
            $date = $this->date->format('d/m/Y à H:i');
            $message  = nl2br(htmlentities($this->message)); // nl2br = ajout au saut de ligne un br / new line to <br>
            return <<<HTML
            <p>
                <strong>{$username}</strong> <em>le {$date} </em> <br>
                {$message}
            </p>
HTML;
        }

        // On convertit notre object Message dans une chaîne de caractères qui represente le Message encodé
        // json_encode renvoie un string
        public function toJSON() : string
        {
            return json_encode([
                'username' => $this->username,
                'message'  => $this->message,
                'date'     => $this->date->getTimestamp() // on sauvegarde uniquement le Timestamp, nb de secondes depuis 1970
            ]);
        }

   }
