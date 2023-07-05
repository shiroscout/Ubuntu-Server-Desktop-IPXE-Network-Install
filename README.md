# Ubuntu-Server-Desktop-IPXE-Network-Install
###     Workspace - Ubuntu 23.04
###     Test Environment: Hyper-V Lab
###     Network: Isolated Lan, Shared External NIC; 1 2.5GB USB Nic
###     Server has static IP Address, Clients getting DHCP Address from Server
###     Services: DHCP, NFS, TFTP, Apache2, s/FTP
###     Tested on: Ubuntu 23.04, 22.04.2 LTS, 20.04.6 LTS, 18.04.6 LTS

### Example Install
![Ubuntu-IPXE-NFS-Install_AdobeExpress](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/3ff2c29d-40bd-4179-9f58-0c8d5c991577)


### Ubuntu Server Mirros for Downloads
### https://launchpad.net/ubuntu/+cdmirrors
### Download desired ISO image
### Copy ISO Files to server web server root folder
### See Example and explanation. Only 2 folders and 2 files are required. All other files and folders can be removed.
![Screenshot 2023-07-05 172601](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/d963ac4f-6a19-4694-8e4d-e2ed70ba3940)

### Note - If you try IPXE booting and get errors, go to IPXE site for reference on the errors. Also, first thing, check permissions on your uploaded files and folders.
### Can be RW-R-R 644 and if your root or user you are the owner. Could be different or better options, but I'm not a Linux Guru.
# Question before we begin...Are all services working on Ubuntu system setup as your server?
### Ubuntu Server Setup
### Official Server Docs
### https://ubuntu.com/server/docs
### https://www.server-world.info/en/note?os=Ubuntu_23.04&p=download


# Cockpit Server Dashboard - Helpful Tool for easily monitoring services
![image](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/bca85281-cd46-42fc-97ec-5e17559560ac)

### DHCP and Apache2 are required, unless you are tweaking your setup and possibly using TFTP and NFS
### but directions here are for using IPXE setup and use.
### TFTP is required for legacy/problematic NICS until you can get transferred to IPXE and HTTP
### of if for some reason you need to install that way. I have the NFS and FTP listed I guess as a bonus. I am tinkering with other 
### learning so if helps to have all these services installed to not have to stop mide-stream and installl more packages, setup services, etc...

### A webserver needs setup with a root directory to serve the files. I've cheated and setup my web server and NFS Server to use the same folders.
### Web Server root serve folders is : /netboot/boot/
### NFS mount is /netboot/boot/
### Inside boot folder is : ubuntu folder
![Screenshot 2023-07-05 172540](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/f86cb515-a13c-4a6e-87c5-73838b5172ec)

### Sub-folders of ubuntu are Ubuntu "Versions" folders. Additional folders such as Desktop and Server may be very useful.

### TFTP Server
### In the TFTP folder for files to server, only one file is needed. IPXE.PXE
### See Example: This will point the "PXE Boot and TFTP" to "IPXE and HTTP" and you should be able to continue to completion of installation with this condition.

### Attached to this repository is a sample file. Change the IP Address and the folder path to the Ubuntu Ditribution files as need, save to root web server folder.
### Note: See example of TFTP IPXE.PXE file. This file will need to be created and put in the TFTP root folder serve directory.

# !IMPORTANT! Only 1 edit in the booting.php should be required for all Ubuntu Distros tested in this git.
### Line: IMGARGS
### Parameter: nfsroot
### Change needed? point directory to version of Ubuntu you want to install.
### Examples: nfsroot=xxx.xxx.xxx.xxx:<web root folder>/<path/to/ditro/folder>
### Examples: nfsroot=10.10.10.10:/netboot/boot/ubuntu/18.04LTS
### See Example:
![Screenshot 2023-07-05 172833](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/52402296-975c-4a91-975e-a76b059b3bed)



![Screenshot 2023-07-05 172452](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/c5522b3a-0f38-4745-91fc-b871c7000fa2)

![Screenshot 2023-07-05 172523](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/a6498e78-ba6c-4526-99a0-3d4da1b5d303)

![Screenshot 2023-07-05 172540](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/1eddc2af-26be-4f25-af58-75e2f8b2a5de)

![Screenshot 2023-07-05 172601](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/830e9b43-34a9-4b63-9650-c48f02e1a9d1)

![Screenshot 2023-07-05 172628](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/1916f552-7b2a-445b-aaeb-bbdae70ea9e8)

### References:
### References: IPXE
### Https://ipxe.org/ 
### References: Ubuntu Official Docs
### Ubuntu Server Install- HyperV Installation
### Ubuntu Server documentation | Ubuntu
### ![image](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/a8002d1c-b278-424c-8cbb-1638b184e9a2)

### References: Other Web Articles
### TROUBLESHOOTING
### IPXE IMGARGS Issues
### iPXE script entries for booting Ubuntu 18.04 in different ways (github.com)
### NFS Connection Initramfs
### Installation/OnNFSDrive - Community Help Wiki (ubuntu.com)
### INITRAMFS
### How to build an initramfs using Dracut on Linux - Linux Tutorials - Learn Linux Configuration
### ![image](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/9d2c9e2f-1f4f-4475-a8b9-688557f024ab)

### Notes: 
### The default script files for IPXE are .pxe file extensions.
### We can use .PXE files for some use cases and we can rename them to .PHP file extensions without issues and the IPXE instructions are read natively by IPXE without issues.
### With the booting.PHP file this is exactly what we are doing. The web server does not know what to do with a .PXE file, so we can rename it and the websever will allow the file to be served, and IPXE will handle the ### instructions in the file.


