<div class="row category-panel">
<div class="panel panel-danger">
<div class="panel-heading">
<h3 class="panel-title">TIN TỨC</h3>
</div>
 <ul class="link-panel">
            @foreach($news_common as $product)
         <li>
            <a href="{{Asset('tintuc')}}/{{$product->category_title}}/{{$product->name}}-{{$product->id}}" id="news-dot" class="news-dot" >
            <span class="news-dot-title">{{$product->title}}</span>
            </a>

         </li>
            @endforeach
      </ul>
</div>
</div>
