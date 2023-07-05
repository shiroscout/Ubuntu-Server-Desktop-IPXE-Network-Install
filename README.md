# Ubuntu-Server-Desktop-IPXE-Network-Install
### Workspace - Ubuntu 23.04
### Test Environment: Hyper-V Lab
### Network: Isolated Lan, Shared External NIC; 1 2.5GB USB Nic
### Server has static IP Address, Clients getting DHCP Address from Server
### Services: DHCP, NFS, TFTP, Apache2, s/FTP
### Tested on: Ubuntu 23.04, 22.04.2 LTS, 20.04.6 LTS, 18.04.6 LTS

# Question before we begin...Are all services working on Ubuntu system setup as your server?
### Ubuntu Server Setup
### https://www.server-world.info/en/note?os=Ubuntu_23.04&p=download
###Ubuntu Server documentation | Ubuntu![image](https://github.com/shiroscout/Ubuntu-Server-Desktop-IPXE-Network-Install/assets/124478493/77e35fc6-07c4-4e0d-9710-a07d794f71dc)

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
###inside boot folder is : ubuntu folder
### Sub-folders of ubuntu are Ubuntu "Versions" folders. Additional folders such as Desktop and Server may be very useful.

# !IMPORTANT! Only 1 edit in the booting.php should be required for all Ubuntu Distros tested in this git.
### Line: IMGARGS
### Parameter: nfsroot
### Change needed? point directory to version of Ubuntu you want to install.
### Examples: nfsroot=xxx.xxx.xxx.xxx:<web root folder>/<path/to/ditro/folder>
### Examples: nfsroot=10.10.10.10:/netboot/boot/ubuntu/18.04LTS

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

