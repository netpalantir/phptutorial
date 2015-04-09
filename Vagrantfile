# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure(2) do |vconfig|
  vconfig.vm.box = "ubuntu/trusty64"
  
  # Create the 
  vconfig.vm.define :site do |config|
    config.vm.provider :virtualbox do |v|
      # set memory to > 1GB
      v.customize [ "modifyvm", :id, "--memory", "1100" ]
      # maybe this will help Windows hosts with symlinks
      v.customize ["setextradata", :id, "VBoxInternal2/SharedFoldersEnableSymlinksCreate/vagrant", "1"]
    end
    config.vm.host_name = "sitevagrant"

    # set lavish permission so that everything is executable
    config.vm.synced_folder "./", "/vagrant", :mount_options => ['dmode=777', 'fmode=666'] #, :nfs=>true

    config.vm.network :private_network, ip: "10.10.10.10"

    # forward to port 8888
    config.vm.network "forwarded_port", guest: 80, host: 8888

    config.vm.provision :shell, :path => "ansible/provision.sh"
  end  
end
