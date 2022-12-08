
<div class='col-sm-6 kinhnghiem'>
   <div class='col-sm-12 form-kinhnghiem hvr-glow'>
      <div class='row category-kinhnghiem'>
         <span class='span-kinhnghiem'>KINH NGHIỆM</span>
      </div>
      <div class='row content-kinhnghiem'>
           @if(!empty($news_kinhnghiem))
                  <?php $i=0;?>
                  @foreach($news_kinhnghiem as $product)
                  <?php $i++;?>
                  @if($i==1)
                     <div class="col-sm-3 image-kinhnghiem">
                        <a href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}" id="">
                        <img src="{{Asset('assets')}}/img/news/{{$product->image}}" class="img-responsive img-category" alt=""/>
                        </a>
                     </div>
                     <div class="col-sm-9 detail-kinhnghiem">
                       
                     <div class="row title-detail-kinhnghiem">
                        <a href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}"><span class='span-bold-blue'>{{$product['title']}}</span></a>
                     </div>
                     <div class="row content-detail-kinhnghiem">
                     {{$product['content_summary']}}
                     </div>
                  @endif
                 @endforeach
                 @endif
           
            <div class="row other-kinhnghiem">
               <ul class="list-unstyled ">
                  @if(!empty($news_kinhnghiem))
                  <?php $i=0;?>
                  @foreach($news_kinhnghiem as $product)
                  <?php $i++;?>
                   @if($i!=1)
                  <li class="link-other-kinhnghiem">
                     <a href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}" id="btn-news-categoty-top" class="" >
                     <span class="viewed-name">{{$product['title']}}</span>
                     </a>
                  </li>
                  @endif
                 @endforeach
                 @endif
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<!--End panel-->

