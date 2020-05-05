echo "installing apaches server"
sudo apt-get install apache2 -y

echo "installing php"
sudo apt-get install php5 libapache2-mod-php5 -y

echo "installing  mysql"
sudo apt-get install mysql-server php5-mysql -y

echo "installing flex bison"
sudo apt-get install flex bison -y

echo "installing doxygen"
sudo apt-get install doxygen -y

