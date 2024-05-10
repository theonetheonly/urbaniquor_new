function addToCart(product_id) {
	// alert(product_id);
}

function togglePanes(active, cats) {

	//            var div1 = "#" + div1;
	  //          var div2 = "#" + div2;
		//        var div3 = "#" + div3;
	
				   var cat_obs = cats.split(":");
						for(var x =0; x < cat_obs.length; x++)
						{
							var divx = "#" + cat_obs[x];
							 if(cat_obs[x]==active)
								{
									  $(divx).fadeIn(3000);
	
								}
								else{
									 $(divx).fadeOut(2000);
								}
	
						}
			//                    alert(cat_obs);
			//      $(div1).fadeIn(3000);
			//    $(div2).fadeOut(2000)
	//
	//  $(div3).fadeOut(2000);
	
	
			}
