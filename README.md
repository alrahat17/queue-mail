# queue-mail
To send mail to all users using queue


1. make mail

php artisan make:mail offerMail

2.change in smtp (mailtrap) from .env

3.make job

php artisan make:job sendOfferMail

4.configure routes.

Route::get ('sendmail',function(){

	sendOfferMail::dispatch();
	return "Offer Email sent";

});

5. To use database queue driver change QUEUE_CONNECTION=database in .env and then

php artisan queue:table
php artisan migrate

6.Use delay

sendOfferMail::dispatch()
                ->delay(now()->addSeconds(5));

7.Change in the handle() function from Jobs/sendOfferMail

public function handle()
    {   
       Mail::to(User::all('email'))->send(new offerMail());
    }

8. use php artisan config:cache, php artisan config:clear as necessary.

9.To check how queue is working 

php artisan queue:work

10.Voila ! Page will refresh instantly, but mail will be sent after delay.

