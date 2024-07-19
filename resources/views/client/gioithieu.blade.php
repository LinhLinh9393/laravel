@extends('client.layouts.app')

@section('content')
    <div class="container-fluid fruite py-5" style="margin-top: 150px">
        <h1 class="text text-center" style="font-size: 50px">Về chúng tôi</h1>

        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="{{ asset('client/img/best-product-1.jpg') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('client/img/best-product-2.jpg') }}" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="{{ asset('client/img/best-product-3.jpg') }}" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>

          <div class="content mt-4 ms-5">
            Chào mừng bạn đến với Trang Tin Tức của chúng tôi!<br>

            Chúng tôi xin gửi lời chào trân trọng đến bạn từ Trang Tin Tức, nơi cung cấp những thông tin nóng hổi và đa dạng về các sự kiện, xu hướng và các câu chuyện thú vị từ khắp nơi trên thế giới.
            <br><br>
            <h3>Sứ mệnh của chúng tôi</h3>
            Tại Trang Tin Tức, sứ mệnh của chúng tôi là cung cấp cho bạn những tin tức chính xác, đáng tin cậy và mang tính thời sự cao nhất. Chúng tôi cam kết mang đến cho bạn những bài viết phong phú và sâu sắc về các lĩnh vực như:
            <br>
            - Thế giới: Theo dõi những diễn biến mới nhất về chính trị, kinh tế, và xã hội trên toàn thế giới.
            <br>
            - Khoa học và Công nghệ: Khám phá các đột phá khoa học, công nghệ mới nhất, và ứng dụng công nghệ vào cuộc sống hàng ngày.
            <br>
            - Văn hóa và Đời sống: Đưa đến bạn những bài viết thú vị về văn hóa đa dạng, du lịch, và phong cách sống.
            <br>
            - Giáo dục và Sức khỏe: Chia sẻ những thông tin hữu ích về giáo dục, sự nghiệp, sức khỏe và cách sống lành mạnh.
            <br><br>
            <h3>Tại sao nên tin tưởng chúng tôi?</h3>
            Chúng tôi tự hào là đội ngũ biên tập viên giàu kinh nghiệm và đội ngũ nhiếp ảnh viên chuyên nghiệp, luôn nỗ lực để mang đến cho bạn những bài viết chất lượng nhất. Chúng tôi cam kết tuân thủ nguyên tắc báo chí và luôn cập nhật nhanh chóng các thông tin mới nhất.
            <br><br>
            <h3>  Tham gia cùng chúng tôi</h3>
            Hãy cùng chúng tôi khám phá và chia sẻ những câu chuyện thú vị trên Trang Tin Tức. Để không bỏ lỡ bất kỳ thông tin nào, hãy đăng ký nhận tin hoặc theo dõi chúng tôi trên các mạng xã hội.
            <br>
           <p class="text text-center mt-4" style="font-size: 20px; "> Cảm ơn bạn đã ghé thăm Trang Tin Tức của chúng tôi. Chúng tôi hy vọng rằng bạn sẽ có những trải nghiệm đáng nhớ và bổ ích trên trang web của chúng tôi.
        </p>
          </div>
    </div>

@endsection
