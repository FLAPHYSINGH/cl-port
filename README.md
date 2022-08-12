# For Setup Project
 This Project Based On CI3 Frame Work
1. Clone Project
2.  Create a database "sphera" use sql query from sql_diff.sql
3. Change Usermame ,Password ,Host and database Name
4. Database Details Define in   "cl-port/application/config/basic_setup.php"
5. For Browser Controller Please Check  Billing Controller path "cl-port/application/controllers/Billing.php"
6. For Api Controller Please Check Song controller "cl-port/application/controllers/api/Song.php"
7. For Model Please check Billing_mode "cl-port/application/models/Billing_model.php"
8. For View Check under view folder
9. Some Ie.Api Url http://base_url/index.php/api/song/getSongbyName
	{"name":"Move Your Body"}
10. http://clportfolio.com/index.php/api/song/showArtist
Methord GET
Response: 
{"status":"success","message":"Show Artist Details","data":[{"asartist_name":"Lata","album_name":"Old West Clothing","album_year":"1990-08-12"},{"asartist_name":"Lata","album_name":"A mere Vatan Ke logo","album_year":"1990-08-12"},{"asartist_name":"Kishor","album_name":"Tum DIl ki","album_year":"1990-08-12"},{"asartist_name":"Kishor","album_name":"Yearly Income","album_year":"2022-02-07"}]}
11. All Api GET Methord
