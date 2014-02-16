# Convert prod sql to localhost
#sed "s/http:\/\/www.shook.fm\/content/http:\/\/localhost\/shook/g" dump-local.sql > temp.sql

# load sql
mysql --max_allowed_packet=512M -uroot -proot shookfm_wp01 < temp.sql;

# If problem, run this from the mysql commandline:
set global net_buffer_length=1000000; 
set global max_allowed_packet=1000000000;

# Now, you should be able to access at: http://localhost/bugz/

# Admin is at http://localhost/bugz/wp-admin
# user=admin, pass=jezmon22 
