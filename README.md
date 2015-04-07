# Materiale informativo per corso PHP

## Vagrant

Per seguire le esercitazioni, è necessario avere a disposizione un'installazione di Vagrant funzionante. 

Per farlo:
- scaricare e installare git per la propria piattaforma da qui: http://git-scm.com/downloads (o dal repository appropriato)
- scaricare e installare VirtualBox per la propria piattaforma da qui: https://www.virtualbox.org/wiki/Downloads (o dal repository appropriato)
- scaricare e installare Vagrant per la propria piattaforma da qui: http://www.vagrantup.com/downloads.html (scaricare Vagrant anche in caso di utilizzo di Ubuntu: il repository ufficiale non è aggiornato)
- clonare questo repository in una cartella
- aprire un prompt e spostarsi nella cartella clonata, quindi eseguire il comando: `vagrant up`
- una volta completato il download e l'esecuzione, aprire un browser, e navigare verso http://localhost:8888 Dovrebbe essere visibile la pagina phpinfo.
- chiudere vagrant con il comando `vagrant suspend`
