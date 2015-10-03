# Canary-Sunriset
Sviluppo di un sistema software per la gestione di un allevamento di canarini. Il sistema ha un solo utente, l’allevatore, il quale interagisce col sistema stesso per avere un quadro completo dello stato del suo impianto.

Il sistema nasce in ambito accademico, il professore ci ha consigliati sulle scelte critiche durante la l'intera fase di sviluppo.

#Scopo
Il sistema ha il compito di regolare l’intensità dei LED in modo da simulare il fenomeno dell’alba-tramonto, misurare temperatura, umidità e intensità luminosa in una stanza. È prevista la comunicazione al sistema tramite smartphone o tablet senza collegamento alla rete internet (in genere questi allevamenti sono istallati in luoghi in cui non è sempre presente un collegamento alla rete), attraverso una pagina web in modo da poter agire sul controllo, tramite tecnologia wireless. Tutte le informazioni raccolte sono memorizzate in un database, in modo che, in futuro, può esserci un rapido accesso a esse, senza alcuno sforzo.

#Design
Il sistema è dotato di un server, realizzato tramite una piattaforma WAMP, una scheda elettronica Arduino con modulo wireless ESP8266, anch’esso impostato come server, e dispositivi mobili che fanno da client. Tutto il sistema è connesso a una rete locale (Canaryrl) tramite un router wireless; sono stati assegnati dal router degli indirizzi IP statici al server (canaryserver) 192.168.0.2 e al modulo wireless ESP8266 192.168.0.3, ai client sono assegnati invece gli indirizzi 192.168.0.XXX. 
Il server, piattaforma WAMP, fornisce tutta la logica del sistema, la gestione degli accessi e della persistenza. Sulla scheda elettronica Arduino sono implementate le logiche di raccolta dati dall’ambiente fisico e la funzione che simula il fenomeno alba-tramonto. I client devono solo connettersi alla rete e accedere al server.


