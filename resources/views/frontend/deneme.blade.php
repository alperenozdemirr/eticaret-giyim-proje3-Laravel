<div class="review_box">
    <h4>Yeni Yorum Ekle</h4>
    <p>İçerik</p>
    <form action="{{route('newComment')}}" method="POST" class="form-contact form-review mt-3">
        @csrf
        <input type="hidden" name="product_id" value="{{$product->id}}">
        <div class="form-group">
            <textarea class="form-control different-control w-100" name="comment_content"
                      id="textarea" cols="30" rows="5" placeholder="Yorum içeriği.."></textarea>
        </div>
        <div class="form-group text-center text-md-right mt-3">
            <button type="submit" class="button button--active button-review">Yorumu Gönder</button>
        </div>
    </form>
</div>
