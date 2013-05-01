COMMAND_FILE_CONTENTS=""
CONFIG_FILE_CONTENTS=""

CONFIG_FILE_LOCATION="directory"
COMMAND_FILE_LOCATION="directory"
FIFO_FILE_LOCATION="directory"

CONFIG_FILE_NAME="filename"
COMMAND_FILE_NAME="filename"
FIFO_FILE_NAME="filename"

FIFO_CHMOD_CONFIG="777"

sudo apt-get install git-core
sudo apt-get install libao-dev
sudo apt-get install libmad0-dev
sudo apt-get install libfaac-dev
sudo apt-get install libfaad-dev
sudo apt-get install libgnutls-dev
git clone git://github.com/PromyLOPh/pianobar.git
cd pianobar
make
sudo make install

sudo mkdir -p $CONFIG_FILE_LOCATION
sudo mkdir -p $COMMAND_FILE_LOCATION
sudo mkdir -p $FIFO_FILE_LOCATION

sudo echo $COMMAND_FILE_CONTENTS > $COMMAND_FILE_LOCATION/$COMMAND_FILE_NAME
sudo echo $CONFIG_FILE_CONTENTS > $CONFIG_FILE_LOCATION/$CONFIG_FILE_NAME
sudo echo "" > $FIFO_FILE_LOCATION/$FIFO_FILE_NAME

sudo chmod $FIFO_CHMOD_CONFIG $FIFO_FILE_LOCATION/$FIFO_FILE_NAME
