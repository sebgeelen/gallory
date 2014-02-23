sudo apt-get update
sudo apt-get -y install make
sudo apt-get -y install dkms build-essential linux-headers-generic
sudo apt-get -y install linux-headers-$(uname -r)
echo " / cmd to run :"
echo " |"
echo " |-> sudo apt-get -y install apache2 php5 mysql-server libapache2-mod-php5 php5-mysql"
echo " |"
echo " \ ------------"
