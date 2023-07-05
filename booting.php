#!ipxe
echo  CONNECTED VIA HTTP...
echo =============================


echo Starting to Load VMLINUZ...
echo =============================
kernel http://192.168.168.168/vmlinuz

echo VMLINUZ Loading Completed
echo =============================

echo Starting  to Load INITRD...
echo =============================
initrd http://192.168.168.168/initrd
imgargs vmlinuz initrd=initrd nfsroot=192.168.168.168:/netboot/boot/ubuntu-nfs/ubuntu2004 netboot=nfs boot=casper ip=dhcp

echo STATUS:: BOOT Loader Operating System Files...
echo =============================
echo Trying to connect to NFS Server
echo ==============================
echo Booting up now
boot
echo Installing Now
echo =============================

