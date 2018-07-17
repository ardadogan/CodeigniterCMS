<?php




if ( ! function_exists('_r'))
{
	function _r($tag=false,$return=false,$category='words')
	{

		if(!$tag){
			if($return){
				return 'empty _r()';
			}else{
				echo 'empty _r()';
				return false;
			}
		}

		$ci =& get_instance();


		# Gelen kelimeyi word tablosunda ara
		$query = $ci->db->where('tag',$tag)->get('words');


		if($query->num_rows()<1){
			# Gelen kelime words tablosunda tanımlı değil
			
			emptyWordLog($tag,$category);

			
			if($return){
				return '*'.$tag;
			}else{
				echo '*'.$tag;
			}


		}else{
			# Gelen kelime words tablosunda kayıtlı
			# Aktif dilde karşılığını bul
			
			# Gelen kelimenin satır bilgisi
			$info = $query->row();

			# Translate karşılığını bul
			$tQuery = $ci->db
					->where('languageId',$ci->app->language->languageId)
					->where('wordId',$info->wordId)
					->get('words_translate');

			if($tQuery->num_rows()<1){
				# Gelen kelimenin aktif dilde karşılığı yok
				if($return){
					return '!'.$tag;
				}else{
					echo '!'.$tag;
				}
			}else{
				# HERŞEY YOLUNDA
				# Gelen kelime çevirisi mevcut. Değer döndürülür
				
				$translation = $tQuery->row();

				if($return){
					if(empty($translation->translation)){
						return '!'.$tag;
					}else{
						return $translation->translation;
					}
				}else{
					if(empty($translation->translation)){
						echo '!'.$tag;
					}else{
						echo $translation->translation;
					}
				}

			}

		}


		if($return){
			return '';
		}else{

		}


	}
}




if ( ! function_exists('emptyWordLog'))
{
	function emptyWordLog($word=false,$category=false)
	{

		if($word){

			$ci =& get_instance();

			$query = $ci->db->where('word',$word)->get('words_translation_logs');

			if($query->num_rows()<1){



				$array = array(
					'word'=>$word,
					'count'=>1,
					'description'=>'Kelime word tablosunda yok'
					);

				$ci->db->insert('words_translation_logs',$array);
			
			}else{

				$info = $query->row();


				$count = $info->count+1;


				# Eğer kelime 3 kez kullanılmışsa artık logda değil words tablosune eklenir

				if($count<=1){
					
					# Log ekle

					$array = array(
						'word'=>$word,
						'count'=>$count,
						'description'=>'Kelime word tablosunda yok',
						);

					$ci->db->where('id',$info->id);
					$ci->db->update('words_translation_logs',$array);
				}else{

					# Log güncelle
						$array = array(
							'word'=>$word,
							'count'=>$count,
							'description'=>'kelime word tablosune eklendi',
							);

						$ci->db->where('id',$info->id);
						$ci->db->update('words_translation_logs',$array);


					#Word tablosune ekle
						$wordsData = array(
							'tag'=>$word,
							'category'=>$category
							);

						$ci->db->insert('words',$wordsData);

				}


			}


		}


	}
}




if ( ! function_exists('_l'))
{
	function _l($tag=false,$return=false,$category='words')
	{

		if(!$tag){
			if($return){
				return 'empty _l()';
			}else{
				echo 'empty _l()';
				return false;
			}
		}

		$ci =& get_instance();


		# Gelen kelimeyi word tablosunda ara
		$query = $ci->db->where('tag',$tag)->get('words');


		if($query->num_rows()<1){
			# Gelen kelime words tablosunda tanımlı değil
			
			emptyWordLog($tag,$category);

			
			if($return){
				return '*'.$ci->activeLang->code.'/'.$tag;
			}else{
				echo '*'.$ci->activeLang->code.'/'.$tag;
			}


		}else{
			# Gelen kelime words tablosunda kayıtlı
			# Aktif dilde karşılığını bul
			
			# Gelen kelimenin satır bilgisi
			$info = $query->row();

			# Translate karşılığını bul
			$tQuery = $ci->db
					->where('languageId',$ci->app->language->languageId)
					->where('wordId',$info->wordId)
					->get('words_translate');

			if($tQuery->num_rows()<1){
				# Gelen kelimenin aktif dilde karşılığı yok
				if($return){
					return '!'.$ci->activeLang->code.'/'.$tag;
				}else{
					echo '!'.$ci->activeLang->code.'/'.$tag;
				}
			}else{
				# HERŞEY YOLUNDA
				# Gelen kelime çevirisi mevcut. Değer döndürülür
				
				$translation = $tQuery->row();

				if($return){
					if(empty($translation->translation)){
						return '!'.base_url($ci->activeLang->code.'/'.$tag);
					}else{
						return base_url($ci->activeLang->code.'/'.$translation->translation);
					}
				}else{
					if(empty($translation->translation)){
						echo '!'.$tag;
					}else{
						echo $translation->translation;
					}
				}

			}

		}


		if($return){
			return base_url($ci->activeLang->code.'/'.'');
		}else{

		}


	}
}



?>