<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use PHPHtmlParser\Dom;
class Bartek extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bartek:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Komenda testowa';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dom = new Dom;

	    for($i = 1; $i < 1000; $i++) {

		    $this->info('KROK: https://jbzdy.pl/strona/' . $i);

		    $dom->loadFromUrl( 'https://jbzdy.pl/strona/' . $i );
            $site = 'jbzdy';
		    foreach ( $dom->find( '.media' ) as $media ) {
			    $img = $media->find( 'img' );
			    if ( isset( $img[0] ) ) {
				    $fileName = pathinfo( $img[0]->getAttribute( 'src' ), PATHINFO_BASENAME );
                    $data = 'image';
				    $file = file_get_contents( $img[0]->getAttribute( 'src' ) );
				    $this->info('w krok '.$i.', znaleziono ' . $fileName);

				    Storage::disk( 'public' )->put( $site .'/'. $data .'/'. $fileName, $file );
			    } else {
				    $this->info('w krok '.$i.', nie znaleziono zdjec');
			    }

			    $video = $media->find( 'source' );
			    if ( isset( $video[0] ) ) {
				    $fileName = pathinfo( $video[0]->getAttribute( 'src' ), PATHINFO_BASENAME );
                    $data = 'movie';
				    $this->info('w krok '.$i.', znaleziono wideo ' . $fileName);

				    $file = file_get_contents( $video[0]->getAttribute( 'src' ) );

				    Storage::disk( 'public' )->put( $site .'/'. $data .'/'. $fileName, $file );
			    } else {
				    $this->info('w krok '.$i.', nie znaleziono filmow');
			    }
//	    	if($img) {
//	    		echo $img[0]->getAttribute('src');
//		    }
		    }
	    }
    }
}
