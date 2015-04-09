# Materiale informativo per corso PHP

## Vagrant

Per seguire le esercitazioni, è necessario avere a disposizione un'installazione di Vagrant funzionante. 

Per farlo:
- scaricare e installare git per la propria piattaforma da qui: http://git-scm.com/downloads (o dal repository appropriato). In Windows, le impostazioni di default vanno bene.
- scaricare e installare VirtualBox per la propria piattaforma da qui: https://www.virtualbox.org/wiki/Downloads (o dal repository appropriato)
- scaricare e installare Vagrant per la propria piattaforma da qui: http://www.vagrantup.com/downloads.html (scaricare Vagrant anche in caso di utilizzo di Ubuntu: il repository ufficiale non è aggiornato)
- clonare questo repository in una cartella locale (aprire Esplora Risorse in una cartella vuota, tasto destro Git Bash, e inserire il comando: `git clone https://github.com/netpalantir/phptutorial.git` Il repository viene scaricato.)
- aprire con Esplora Risorse la cartella appena clonata (dove c'è il file "Vagrantfile"), cliccare con il tasto destro e scegliere git bash, nel prompt dei comandi che compare dare il comando: `vagrant up`
- una volta completato il download e l'esecuzione, aprire un browser, e navigare verso http://localhost:8888 Dovrebbe essere visibile la pagina phpinfo.
- chiudere vagrant con il comando `vagrant suspend`

Nota: il primo comando `vagrant up` scarica l'installazione di Ubuntu 14.04 (circa 360MB), e può richiedere del tempo. Se si preferisce scaricare il file una volta sola e poi usarlo su più computer.
1. Scaricare https://vagrantcloud.com/ubuntu/boxes/trusty64/versions/14.04/providers/virtualbox.box
2. `vagrant box add my-box file:///d:/path/to/virtualbox.box`

Windows 8 Pro. Se la virtualizzazione Hyper-V è attiva, il sistema non funzionerà (timeout). In questo caso è necessario disattivarla temporaneamente (Win+R... appwiz.cpl... Attivazione o disattivazione delle funzionalità Windows... (Disattivare) Hyper-V). In generale, per diagnosticare eventuali problemi, è sempre possibile eseguire VirtualBox manualmente, ed avviare manualmente la macchina virtuale creata da vagrant.
