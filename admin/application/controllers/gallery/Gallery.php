<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends MY_Controller {




	public function category($galleryId=false)
	{
			
		$gallery = $this->db->where('galleryId',$galleryId)->get('gallery_category')->row();

		if($gallery->type!='gallery'){

			if($gallery->type=='product'){
				$info = $this->db
						->join('product_lang lng','lng.productId=p.productId')
						->where('lng.languageId',$this->_lang->languageId)
						->where('p.productId',$gallery->contentId)
						->get('product p')
						->row();
				$gallery->name = $info->name;
			}

		}

		$data['category'] = $gallery;

		$data['photos'] = $this->db->where('galleryId',$galleryId)->get('gallery_photos')->result();


		$this->header('Galeri Fotoğrafları');
			$this->load->view('gallery/gallery/photos',$data);
		$this->footer();
	}



	public function create($galleryId=false)
	{
		# Category Info
			$category = $this->db->where('galleryId',$galleryId)->get('gallery_category')->row();

			if($category->type=='gallery'){
				$path = sef_url($category->name);
			}else{
				$path = sef_url($category->type);
			}
		

		# Upload Image
			$imgConfig = array(
				'fileInput' => $_FILES['file'],
				'name' 		=> sef_url($this->appConfig['domain'].'-'.$category->name),
				'path' 		=> '../assets/images/gallery/'.$path,
				'width' 	=> $category->width,
				'height' 	=> $category->height,
				'ratio' 	=> $category->ratio,
				'required' 	=> true
				);

			$img = image_upload($imgConfig);
		

			
			$sData = array(
				'galleryId' => $category->galleryId,
				'image' => $img,
				'createDate' => date('Y-m-d H:i:s')
				);


		# Create Photos
			
			if($this->db->insert('gallery_photos',$sData)){
				exit("success||success");
			}else{
				exit("error||error");
			}


		$this->pre($saveData);

	}


	public function ajax($galleryId=false)
	{
			
		$category = $this->db->where('galleryId',$galleryId)->get('gallery_category')->row();

		$photos = $this->db->where('galleryId',$galleryId)->get('gallery_photos')->result();

		if($category->type=='gallery'){
			$path = sef_url($category->name);
		}else{
			$path = sef_url($category->type);

		}

		foreach ($photos as $key => $value) {
			echo '
				<div class="col-sm-2 col-xs-4 deleted_row_'.$value->photoId.'" data-tag="1d">
					
			

					<article class="image-thumb">
						
						<a class="image" href="javascript::" onclick="app.modal(\'gallery/gallery/photosOptions/'.$value->photoId.'\')">
							<img src="'.app_url('assets/images/gallery/'.$path.'/'.$value->image).'" />
						</a>
						
						<div class="image-options">
							<a href="javascript::" onclick="app.modal(\'gallery/gallery/photosOptions/'.$value->photoId.'\')" class="edit"><i class="entypo-pencil"></i></a>
							<a href="javascript::" onclick="app.delete(\'gallery/gallery/delete/\','.$value->photoId.')" class="delete" title="Sil" data-toggle="tooltip" data-placement="top"><i class="entypo-cancel"></i></a>

						</div>
						
					</article>
				
				</div>

			';
		}

	}


	public function delete($photoId=false)
	{

		$this->db->where('photoId',$photoId)->delete('gallery_photos');

		$this->success("Görsel Silindi");
	}


	public function photosOptions($photoId=false)
	{
		$data['photo'] 		= $this->db->where('photoId',$photoId)->get('gallery_photos')->row();
		$data['gallery'] 	= $this->db->where('galleryId',$data['photo']->galleryId)->get('gallery_category')->row();

		$this->load->view('gallery/gallery/photos_options',$data);
	}


	public function photosOptionsSave()
	{
		$formData = $this->input->post();

		$this->db->where('photoId',$formData['photoId'])->update('gallery_photos',$formData);

		$this->success("Görsel bilgileri güncellendi");

	}




	





}
