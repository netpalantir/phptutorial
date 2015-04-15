# Materiale informativo per corso PHP

## Vagrant

Per seguire le esercitazioni, è necessario avere a disposizione un'installazione di Vagrant funzionante. 

- scaricare e installare *git* per la propria piattaforma da qui: http://git-scm.com/downloads (o dal repository appropriato). In Windows, le impostazioni di default vanno bene.
- scaricare e installare *VirtualBox* per la propria piattaforma da qui: https://www.virtualbox.org/wiki/Downloads (o dal repository appropriato)
- scaricare e installare *Vagrant* per la propria piattaforma da qui: http://www.vagrantup.com/downloads.html (scaricare Vagrant anche in caso di utilizzo di Ubuntu: il repository ufficiale non è aggiornato)
- clonare questo repository in una cartella locale (aprire Esplora Risorse in una cartella vuota, tasto destro Git Bash, e inserire il comando: `git clone https://github.com/netpalantir/phptutorial.git` )
- aprire con Esplora Risorse la cartella appena clonata (dove c'è il file "Vagrantfile"), cliccare con il tasto destro e scegliere git bash, nel prompt dei comandi che compare dare il comando: `vagrant up`
- una volta completato il download e l'esecuzione, aprire un browser, e navigare verso http://localhost:8888 Dovrebbe essere visibile la pagina phpinfo.

Per sospendere la macchina, e riprenderla in un secondo momento: `vagrant suspend`
Per riprendere il lavoro: `vagrant up`
Per distruggere la macchina e liberare spazio: `vagrant destroy`
Per eliminare anche il file di installazione del box: `vagrant box remove ubuntu/trusty64`

Nota: il primo comando `vagrant up` scarica l'installazione di Ubuntu 14.04 (circa 360MB), e può richiedere del tempo. Se si preferisce, è possibile scaricare il file una volta sola e poi usarlo su più computer.

1. Scaricare https://vagrantcloud.com/ubuntu/boxes/trusty64/versions/14.04/providers/virtualbox.box
2. Nella cartella dove è stato salvato il file, dopo aver aperto una shell, dare il comando: `vagrant box add ubuntu/trusty64 trusty-server-cloudimg-amd64-vagrant-disk1.box`

*Windows 8 Pro*. Se la virtualizzazione Hyper-V è attiva, il sistema non funzionerà (timeout). In questo caso è necessario disattivarla temporaneamente (Win+R... appwiz.cpl... Attivazione o disattivazione delle funzionalità Windows... (Disattivare) Hyper-V). In generale, per diagnosticare eventuali problemi, è sempre possibile eseguire VirtualBox manualmente, ed avviare manualmente la macchina virtuale creata da vagrant, per vedere gli eventuali messaggi di errore.

## NetBeans

Sarà inoltre necessario scaricare e installare NetBeans in edizione HTML5 & PHP, da qui: https://netbeans.org/downloads/index.html
