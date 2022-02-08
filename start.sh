if [ ! -n "$1" ]
then
    echo 'error: speecify service to start'
    exit
fi

cd $1

bash start.sh
