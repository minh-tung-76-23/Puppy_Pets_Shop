-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 31, 2023 lúc 08:55 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `puppypetshops`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `category_id`, `brand_name`) VALUES
(1, 1, 'Đồ chơi cho chó'),
(2, 2, 'Đồ chơi cho mèo'),
(3, 4, 'Thức ăn cho chó'),
(4, 4, 'Sữa tắm cho chó'),
(5, 4, 'Quầy Lông Chuồng Túi xách'),
(6, 4, 'Y tế & thuốc cho chó'),
(8, 4, 'Đồ chơi phụ kiện huấn luyện chó'),
(14, 5, 'Thức ăn cho mèo'),
(15, 5, 'Khay cát - vệ sinh'),
(16, 5, 'Sữa tắm cho mèo'),
(17, 5, 'Y tế & thuốc cho mèo'),
(18, 5, 'Phụ kiện & đồ ăn vặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(3, 'DỊCH VỤ'),
(4, 'SHOP CHÓ YÊU'),
(5, 'SHOP MÈO YÊU'),
(6, 'TIN TỨC LIÊN QUAN'),
(7, 'SẢN PHẨM'),
(8, 'LIÊN HỆ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_price_new` varchar(255) NOT NULL,
  `product_des` varchar(5000) NOT NULL,
  `product_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_price`, `product_price_new`, `product_des`, `product_img`) VALUES
(6, 'Balo Vải Vận Chuyển Chó Mèo Big Pet 40*37*25cm', 5, 5, '350000', '320000', '<h4>MÀU SẮC: Nhiều mẫu</h4><h4>Phù Hợp Cân Nặng &lt; 9KG</h4><p>Thông tin sản phẩm:</p><p>- Balo chất lượng đảm bảo: độ thông gió cần thiết, an toàn và không gian rộng rãi với kích thước lớn có thể đựng được nhiều pet và pet nặng dưới 9kg.</p><p>- Thiết kế phong cách phối màu đáng yêu - Balo có tấm cửa phía bên hông, dễ dàng cho thú cưng ra vào mà không cần mở hết balo.</p><p>- Nhiều lưới thoáng khí hai bên và trên trần balo giúp thú cưng không ngộp.</p><p>- Quai đeo chắc chắn và tỉ mỉ có đệm giúp sen không bị đau vai.</p><p>- Khóa kéo trượt êm ái.</p><p>- Kích thước: Cao 37cm x Ngang 40cm x Rộng 25cm</p><p><img src=\"http://localhost/puppypetshops/assets/img/z4349038238258-0e7aadef958ccc14a8c3f65c8afd3837.webp\" alt=\"\" width=\"1024\" height=\"1024\"></p><p>Cách vệ sinh và bảo quản:</p><p>- Khi chó hoặc mèo của bạn tè hay đi bậy vào balo thì trước hết bạn nên dùng khăn giấy lau bớt đi.</p><p>- Sau đó rửa nước và ngâm trong xà bông giặt đồ hoặc chất tẩy quần áo.</p><p>- Ngâm 20-30 phút, sau đó chà rửa sạch xà bông.</p><p>- Phơi khô nơi có nhiều nắng để mau khô và khử khuẩn balo.</p>', 'shopee-ce096e46-9544-489c-af31-eb28a5831db9.webp'),
(9, 'Bánh Quy Sữa Cho Chó Doggyman 180g', 4, 3, '40000', '35000', '<p>Công thức với vi khuẩn axit lactic, một đại diện của vi khuẩn tốt, oligosacarit hỗ trợ sự phát triển của các chất dinh dưỡng và chất xơ giúp hấp thụ và làm bong phân.&nbsp;</p><p>Giúp duy trì sức khỏe tiêu hoá.</p><p>Hương sữa thơm ngon và hấp dẫn, kết cấu giòn giúp&nbsp;kích thích thú cưng thèm ăn.&nbsp;</p><p><img src=\"https://bizweb.dktcdn.net/100/375/956/files/82288-banh-quy-vi-sua-180g-doggyman-05.jpg?v=1701675400994\" width=\"500\" height=\"500\"><img src=\"https://bizweb.dktcdn.net/100/375/956/files/82288-banh-quy-vi-sua-180g-doggyman-06.jpg?v=1701675402221\" width=\"500\" height=\"500\"><img src=\"https://bizweb.dktcdn.net/100/375/956/files/82288-banh-quy-vi-sua-180g-doggyman-04.jpg?v=1701675403193\" width=\"500\" height=\"500\"></p><p>&nbsp;</p><p><strong>Thành phần</strong></p><p>Bột mì, đường, dầu thực vật, tinh bột sắn, sữa bột, chiết xuất rau diếp xoăn (bao gồm chất xơ thực vật, đường oligô), lợi khuẩn (vi khuẩn lactic), chất khoáng (natri, canxi), bột nở, hương liệu, chiết xuất yucca, vitamin E.&nbsp;</p><p>&nbsp;</p><p><strong>Chỉ số thành phần</strong></p><p>Độ ẩm (%) max: 10.00&nbsp;</p><p>Protein thô (%) min: 7.50&nbsp;</p><p>Béo thô (%) min: 5.50&nbsp;</p><p>Xơ thô (%) max: 1.50&nbsp;</p><p>Khoáng tổng (%) max: 3.50&nbsp;</p><p>&nbsp;</p><p><strong>Thương hiệu: DoggyMan&nbsp;</strong></p><p><strong>Trọng lượng: 180g</strong></p>', '82288-banh-quy-vi-sua-180g-doggyman-00.webp'),
(10, 'Hỗn hợp thịt sấy mix vị cho chó mèo Lishi', 4, 3, '55000', '45000', '<p>Hỗn Hợp Thịt Tươi Sấy Khô Cho Chó Mèo</p><p><br>Hỗn hợp thịt tươi sấy khô của 11 loại thịt chất lượng cao : Cá Tuyết + Ức Gà + Chim Cút + Cá Trứng + Vịt Viên + Phomai + Gan Bò + Ức Vịt + Gà Viên + Phổi Bò + Lòng Đỏ Trứng&nbsp;<br><br>THỨC ĂN SẤY KHÔ - Thịt sấy khô cho chó mèo</p><p><br>- Công nghệ sấy lạnh hiện đại âm 36 độ C, giúp bảo quản thức ăn lâu hơn, sử dụng trong thời gian dài hơn mà vẫn giữ toàn vẹn tất cả các chất dinh dưỡng có trong thịt.<br>- Tiện lợi không cần chế biến.<br>- Thích hợp cho ăn hằng ngày.&nbsp;<br><br>HDSD: Có 3 cách sử dụng<br>- Trộn chung với hạt khô kích thích bé thèm ăn<br>- Cho ăn riêng như bánh thưởng<br>- Ngâm nước ấm để thịt khô nở ra<br><br>Bảo quản nhiệt độ phòng<br>HSD : 12 Tháng</p>', 'web-956cc2a7-ccfb-41ac-b8b9-11c8adf2b843.webp'),
(11, 'Hỗn hợp thịt sấy mix vị cho chó mèo Lishi', 5, 14, '55000', '45000', '<p>Hỗn Hợp Thịt Tươi Sấy Khô Cho Chó Mèo</p><p><br>Hỗn hợp thịt tươi sấy khô của 11 loại thịt chất lượng cao : Cá Tuyết + Ức Gà + Chim Cút + Cá Trứng + Vịt Viên + Phomai + Gan Bò + Ức Vịt + Gà Viên + Phổi Bò + Lòng Đỏ Trứng&nbsp;<br><br>THỨC ĂN SẤY KHÔ - Thịt sấy khô cho chó mèo</p><p><br>- Công nghệ sấy lạnh hiện đại âm 36 độ C, giúp bảo quản thức ăn lâu hơn, sử dụng trong thời gian dài hơn mà vẫn giữ toàn vẹn tất cả các chất dinh dưỡng có trong thịt.<br>- Tiện lợi không cần chế biến.<br>- Thích hợp cho ăn hằng ngày.&nbsp;<br><br>HDSD: Có 3 cách sử dụng<br>- Trộn chung với hạt khô kích thích bé thèm ăn<br>- Cho ăn riêng như bánh thưởng<br>- Ngâm nước ấm để thịt khô nở ra<br><br>Bảo quản nhiệt độ phòng<br>HSD : 12 Tháng</p>', 'web-956cc2a7-ccfb-41ac-b8b9-11c8adf2b843.webp'),
(12, 'Hạt Natural Core Puppy cho chó con 1kg - vị Cừu ECO5a', 5, 14, '350000', '290000', '<h4>Đặc điểm nổi bật</h4><p>Thức ăn hữu cơ cho chó con Natural Core thịt cừu được chế biến từ các loại thịt tươi và các nguyên liệu được chứng nhận hữu cơ ECOCERT: thịt cừu Úc và thịt nạc gà hữu cơ, khoai lang hữu cơ và ngũ cốc. Với nhiều chất dinh dưỡng tốt cho sức khỏe thú cưng, ECO5a có tác dụng nổi bật trong việc hỗ trợ sự phát triển của chó con.</p><ul><li>Dành cho chó con dưới 1 tuổi, chó mẹ đang mang thai và cho con bú</li><li>Thành phần: thịt cừu Úc và thịt nạc gà hữu cơ, khoai lang hữu cơ và ngũ cốc</li><li>Không chứa thành phần gây dị ứng cho chó con như bắp, đậu nành, lúa mì</li><li>Tốt cho việc hình thành xương và giúp tăng cường chức năng đường ruột</li><li>Ngăn ngừa tình trạng dị ứng thức ăn ngay từ khi còn nhỏ</li><li>Tăng cường chức năng đường ruột và nâng cao hệ miễn dịch</li><li>Cung cấp protein chất lượng cao cho cún con tăng trưởng và phát triển</li><li>Cho cún con một làn da khỏe mạnh và bộ lông óng mượt</li></ul><h4>Đặc tính - Công dụng</h4><p><strong>Thành phần hữu cơ tốt cho sức khỏe, đặc biệt phù hợp với chó con và chó mẹ.</strong></p><p>Natural Core Eco5 – Thức ăn cho chó con chế biến từ thịt nạc cừu Úc và thịt nạc gà hữu cơ, cung cấp nguồn đạm chất lượng cao, tốt cho việc hình thành hệ xương và sự tăng trưởng của chó con. Ngũ cốc nguyên hạt không loại bỏ vỏ cám cung cấp chất xơ và nhiều khoáng chất cần thiết cho cơ thể.&nbsp;</p><p><strong>Ngăn ngừa tình trạng dị ứng thức ăn thường gặp ở cún con.</strong></p><p>Thức ăn cho chó con thịt cừu không chứa lúa mì/ ngô/ đậu/ gluten/ GMO là các thành phần có thể gây dị ứng thức ăn cho cún. Bởi vậy, sản phẩm giúp phòng tránh tình trạng dị ứng thức ăn ở các chú chó con có dạ dày nhạy cảm.</p><p><strong>Công nghệ đạm thủy phân, tối đa hóa khả năng hấp thu.</strong></p><p>Những nguyên liệu của sản phẩm được chế biến theo phương pháp riêng lẻ, phù hợp với đặc trưng riêng của từng nguyên liệu, thích hợp với chó con có hệ tiêu hóa non yếu.</p><p><strong>Tăng cường hệ miễn dịch, sức đề kháng, cho hệ tiêu hóa khỏe mạnh.</strong></p><p>Các thành phần hữu cơ chứa nhiều polyphenol tự nhiên giúp tăng cường chức năng đường ruột và nâng cao hệ miễn dịch. Thành phần Saponin giúp tăng cường hệ miễn dịch. Vi khuẩn có lợi trong ruột là Prebiotics và Probiotics có vai trò duy trì hệ tiêu hóa khỏe mạnh cho cún con.</p><p><strong>Cho cún cưng làn da khỏe mạnh và bộ lông óng mượt.</strong></p><p>Thịt cừu là loại thịt đỏ có chứa lượng calo cao và mỡ thấp, giàu protein cần thiết và các chất béo không bão hòa giúp duy trì làn da khỏe mạnh. Khoai lang hữu cơ chứa nhiều beta- carotene, có hiệu quả tuyệt vời trong việc ngăn ngừa ung thư và lão hóa da. Yến mạch nguyên cám ngừa viêm da, gạo lứt nguyên hạt giúp giữ gìn làn da khỏe mạnh.</p>', 'z4769936240863-60386889c3579bb46ba62dd4ac9470eb.webp'),
(13, 'Hạt Natural Core Puppy cho chó con 1kg - vị Cừu ECO5a', 4, 3, '350000', '290000', '<h4>Đặc điểm nổi bật</h4><p>Thức ăn hữu cơ cho chó con Natural Core thịt cừu được chế biến từ các loại thịt tươi và các nguyên liệu được chứng nhận hữu cơ ECOCERT: thịt cừu Úc và thịt nạc gà hữu cơ, khoai lang hữu cơ và ngũ cốc. Với nhiều chất dinh dưỡng tốt cho sức khỏe thú cưng, ECO5a có tác dụng nổi bật trong việc hỗ trợ sự phát triển của chó con.</p><ul><li>Dành cho chó con dưới 1 tuổi, chó mẹ đang mang thai và cho con bú</li><li>Thành phần: thịt cừu Úc và thịt nạc gà hữu cơ, khoai lang hữu cơ và ngũ cốc</li><li>Không chứa thành phần gây dị ứng cho chó con như bắp, đậu nành, lúa mì</li><li>Tốt cho việc hình thành xương và giúp tăng cường chức năng đường ruột</li><li>Ngăn ngừa tình trạng dị ứng thức ăn ngay từ khi còn nhỏ</li><li>Tăng cường chức năng đường ruột và nâng cao hệ miễn dịch</li><li>Cung cấp protein chất lượng cao cho cún con tăng trưởng và phát triển</li><li>Cho cún con một làn da khỏe mạnh và bộ lông óng mượt</li></ul><h4>Đặc tính - Công dụng</h4><p><strong>Thành phần hữu cơ tốt cho sức khỏe, đặc biệt phù hợp với chó con và chó mẹ.</strong></p><p>Natural Core Eco5 – Thức ăn cho chó con chế biến từ thịt nạc cừu Úc và thịt nạc gà hữu cơ, cung cấp nguồn đạm chất lượng cao, tốt cho việc hình thành hệ xương và sự tăng trưởng của chó con. Ngũ cốc nguyên hạt không loại bỏ vỏ cám cung cấp chất xơ và nhiều khoáng chất cần thiết cho cơ thể.&nbsp;</p><p><strong>Ngăn ngừa tình trạng dị ứng thức ăn thường gặp ở cún con.</strong></p><p>Thức ăn cho chó con thịt cừu không chứa lúa mì/ ngô/ đậu/ gluten/ GMO là các thành phần có thể gây dị ứng thức ăn cho cún. Bởi vậy, sản phẩm giúp phòng tránh tình trạng dị ứng thức ăn ở các chú chó con có dạ dày nhạy cảm.</p><p><strong>Công nghệ đạm thủy phân, tối đa hóa khả năng hấp thu.</strong></p><p>Những nguyên liệu của sản phẩm được chế biến theo phương pháp riêng lẻ, phù hợp với đặc trưng riêng của từng nguyên liệu, thích hợp với chó con có hệ tiêu hóa non yếu.</p><p><strong>Tăng cường hệ miễn dịch, sức đề kháng, cho hệ tiêu hóa khỏe mạnh.</strong></p><p>Các thành phần hữu cơ chứa nhiều polyphenol tự nhiên giúp tăng cường chức năng đường ruột và nâng cao hệ miễn dịch. Thành phần Saponin giúp tăng cường hệ miễn dịch. Vi khuẩn có lợi trong ruột là Prebiotics và Probiotics có vai trò duy trì hệ tiêu hóa khỏe mạnh cho cún con.</p><p><strong>Cho cún cưng làn da khỏe mạnh và bộ lông óng mượt.</strong></p><p>Thịt cừu là loại thịt đỏ có chứa lượng calo cao và mỡ thấp, giàu protein cần thiết và các chất béo không bão hòa giúp duy trì làn da khỏe mạnh. Khoai lang hữu cơ chứa nhiều beta- carotene, có hiệu quả tuyệt vời trong việc ngăn ngừa ung thư và lão hóa da. Yến mạch nguyên cám ngừa viêm da, gạo lứt nguyên hạt giúp giữ gìn làn da khỏe mạnh.</p>', 'z4769936240863-60386889c3579bb46ba62dd4ac9470eb.webp'),
(14, 'Hạt Kitchen Flavor Cuisine Texas cho chó trưởng thành - vị Gà Nướng & Rong Biển', 4, 3, '89000', '80000', '<p><strong>Global Cuisine (ẩm thực toàn cầu)</strong><br>Định nghĩa về thực phẩm dành cho người sành ăn là hoàn toàn khác nhau giữa các quốc gia. Global Cuisine mang đến bàn ăn những món ngon trên khắp thế giới, từ bữa ăn châu Âu đến ẩm thực phương Đông, để thú cưng có thể chia sẻ những trải nghiệm những món ăn ngon với bạn.</p><p>- Những viên phomai Naples: Mỗi viên phô mai được làm từ stra chọn lọc, thậm chí cộng với kích thước còn lớn hơn, đảm bảo thú cưng của bạn sẽ ngon miệng. Prebiotics và lắt táo gai. Táo gai kích thích sự thèm ăn, kết hợp cùng bột prebiotic. Dinh dưỡng kép hỗ trợ hệ tiêu hóa của cún cưng.</p><p>- Những viên thịt gà nướng kiểu Texas. Mỗi viên gà được làm bằng Kỹ thuật nướng Gia với nước sốt thơm, công với kích thước thậm chí còn lớn hơn đảm bảo thú cưng của bạn sẽ ngon miệng. Lecithin và lát rong biển. Những lát rong biển được phủ một lớp bột lòng đỏ trứng giúp nuôi dưỡng, bảo vệ và phát triển da và lông.</p><p><strong>CÔNG DỤNG</strong></p><p>- Texas For Adult: Thức ăn hỗn hợp hoàn chính dùng cho chỗ trưởng thành (Trên 12-18 tháng tuổi) Một bộ lông bóng mượt cho chó là mong muốn của hầu hết những người nuôi thú cưng.&nbsp;<br>+ Rong biển chứa axit béo không bão hòa omega 3, bổ sung dinh dưỡng cho thần tốc giúp lông bóng mượt.<br>+&nbsp;Inositol trong lecithin là yếu tố chính tạo nên lớp lông dày và rậm.<br>+&nbsp;Việc bổ sung lòng đỏ trứng với hàm lượng lecithin phong phú mang lại dinh dưỡng cho nang tóc.<br>+&nbsp;Da là một kênh quan trọng để cung cấp dinh dưỡng cho thân tóc.<br>+&nbsp;Hàm lượng lecithin phong phủ hỗ trợ chức năng của da</p><p><strong>CHỈ TIÊU CHẤT LƯỢNG</strong></p><p>Đạm thô 2 20%; Béo thị ≥ 17%, Xơ thô ± 5%, Tro thô &lt; 10%; Độ ẩm 10%</p><p>Thành phần chính: Ngô, chiết xuất từ thu (bột thịt gà 14%, thịt gà đông lạnh 1,5%), lúa mì, bột đậu nành, cám lúa mì, chất điều vị (1), hạt rong biển (0.1%), bột lòng đỏ trứng (0.15%)</p><p>Bảo quản sản phẩm nơi khô ráo và thoáng mát, tránh ánh sáng trực tiếp.&nbsp;</p><p>—————————————————<br>???Puppy Pet Shop ???<br>?CS1: 242 Kim Mã - Ba Đình - Hà Nội<br>☎️: 097 1111 242<br>?CS2: 32BT8 - KĐT Văn Quán - Hà Đông (Cổng trường tiểu học Ban Mai)<br>☎️: 098 1111 328<br>?HOTLINE : 091 898 5026</p>', 'shopee-c2d58a0a-9e0e-4a1e-98c5-354cd01c931f.webp'),
(15, 'Pate Cao Cấp cho chó Nutri Plan Premium HOLIC 85g', 4, 3, '45000', '30000', '<p>? PATE HOLIC - PATE CHỨA THỊT VÀ RAU CỦ QUẢ ĐẦU TIÊN TỪ NUTRI PLAN! ?</p><p>&nbsp;Khác với mèo, chó là động vật ăn tạp vì vậy ngoài bổ sung nguồn Protein trực tiếp từ các loại thịt, cún cưng luôn cần những thành phần dinh dưỡng thiết yếu khác như tinh bột, chất xơ, vitamin cùng các khoáng chất tự nhiên khác</p><p>&nbsp;Vậy Sen đã biết gì chưa?</p><p>Pate Holic cho chó hoàn toàn mới từ Nutri Plan đã ra mắt rồi đó! Đây chính là sản phẩm thức ăn bổ sung giàu dinh dưỡng nhất cho Boss mà Sen từng biết đó nha!</p><p>Với nguồn nguyên liệu chứa đầy đủ nguồn đạm từ ???̣? ??́ ???̛̀ ???̆́?? ??̀ ???̣? ?̛́? ??̀ ??? ??̂́? ??????? kết hợp ?? ???̣? ??? ??̉ ???̉ ??̛?̛? ???? khác nhau: Khoai tây, cà rốt, bí đỏ, bắp cải, cần tây, súp lơ, đậu hà lan, táo, lê và nam việt quất</p><p>✨ Chứa tới ?? ???̣? ???̛̣? ???̂̉? ???̀? ???? ??̛?̛̃?? chỉ trong 1 lon pate Holic thơm nức mũi, siêu phẩm đỉnh cao này là không thể bỏ qua được đâu nha Sen uiii, tới samyang liền nha.</p>', 'sp-2-vi.webp'),
(16, 'Thức ăn Hạt mềm ANF Soft Hàn Quốc cho Chó', 4, 3, '95000', '80000', '<p>Phương pháp đặc biệt “Water Tight” – Kín nước là phương pháp giữ chặt nước bên trong kết cấu của hạt, giúp nước không thoát ra ngoài để tạo độ ẩm, mềm xốp cho hạt và ức chế nấm mốc, vi sinh vật xuất hiện ở độ ẩm cao, đồng thời ngăn chặn nguyên nhân gây ra phân lỏng. Cá hồi và thịt gà giúp cải thiện khả năng tiêu hóa và tăng cảm giác ngon miệng.</p><p>Men vi sinh Probiotics và Prebiotics là những vi khuẩn có lợi giúp tăng cường sức khỏe đường ruột, cải thiện tiêu hóa và hạn chế tiêu chảy.</p><p>Axit béo, Omega-3 giúp tài tạo tế bào, làm đẹp da và lông bóng mượt. DHA &amp; EPA trong cá hồi giúp máu lưu thông dễ dàng. Giàu trái cây tươi và rau quả giúp chống oxy hóa và cải thiển tình trạng táo bón. Glucosamine và Chondroitin giúp tăng cường sức khỏe xương khớp và răng miệng. Chiết xuất Yucca giúp giảm mùi hôi của phân.</p><p>GIÁ TRỊ DINH DƯỠNG</p><p>Protein thô ≥ 22.0%</p><p>Chất béo thô ≥ 10.0%</p><p>Chất xơ thô ≤ 3.0%</p><p>Chất khoáng ≤ 9.0%</p><p>Độ ẩm &lt; 25.0%</p><p>Canxi 1.0 – 2.5%</p><p>Photpho 0.6 – 1.5%</p><p>HƯỚNG DẪN BẢO QUẢN</p><p>- Bảo quản nơi khô ráo, thoáng mát, tránh ánh nắng trực tiếp từ mặt trời. -</p><p>Dùng trong thời gian nhanh nhất sau khi mở bao bì.</p><p>- Sau khi mở túi 300gr bên trong sản phẩm, đổ luôn hạt ra bát ăn và buộc chặt miệng túi lại ngay lập tức.</p><p>- Sản phẩm sau khi đã bóc được khuyến khích bảo quản trong ngăn mát tủ lạnh. Trường hợp bảo quản trong tủ lạnh, khi lấy sản phẩm ra để sử dụng, bạn nên đặt sản phẩm ra ngoài khoảng 5-10 phút để sản phẩm trở về trạng thái nhiệt độ thường, sau đó tiếp tục sử dụng cho cún ăn.</p><p>- Ngưng sử dụng sản phẩm đã bị biến chất trong khi bảo quản. (Chú ý bảo quản khi thời tiết nóng ẩm và vào mùa hè) - Bảo quản xa tầm tay trẻ em.</p>', 'shopee-580394b0-a85e-45a1-b60a-9e6ea69aa576.webp'),
(17, 'Balo Vải Vận Chuyển Chó Mèo Big Pet 40*37*25cm', 4, 5, '350000', '320000', '<h4>MÀU SẮC: Nhiều mẫu</h4><h4>Phù Hợp Cân Nặng &lt; 9KG</h4><p>Thông tin sản phẩm:</p><p>- Balo chất lượng đảm bảo: độ thông gió cần thiết, an toàn và không gian rộng rãi với kích thước lớn có thể đựng được nhiều pet và pet nặng dưới 9kg.</p><p>- Thiết kế phong cách phối màu đáng yêu - Balo có tấm cửa phía bên hông, dễ dàng cho thú cưng ra vào mà không cần mở hết balo.</p><p>- Nhiều lưới thoáng khí hai bên và trên trần balo giúp thú cưng không ngộp.</p><p>- Quai đeo chắc chắn và tỉ mỉ có đệm giúp sen không bị đau vai.</p><p>- Khóa kéo trượt êm ái.</p><p>- Kích thước: Cao 37cm x Ngang 40cm x Rộng 25cm</p><figure class=\"image\"><img style=\"aspect-ratio:1024/1024;\" src=\"http://localhost/puppypetshops/assets/img/z4349038238258-0e7aadef958ccc14a8c3f65c8afd3837.webp\" width=\"1024\" height=\"1024\"></figure><p>Cách vệ sinh và bảo quản:</p><p>- Khi chó hoặc mèo của bạn tè hay đi bậy vào balo thì trước hết bạn nên dùng khăn giấy lau bớt đi.</p><p>- Sau đó rửa nước và ngâm trong xà bông giặt đồ hoặc chất tẩy quần áo.</p><p>- Ngâm 20-30 phút, sau đó chà rửa sạch xà bông.</p><p>- Phơi khô nơi có nhiều nắng để mau khô và khử khuẩn balo.</p>', 'shopee-ce096e46-9544-489c-af31-eb28a5831db9.webp'),
(18, 'Áo thun hồng kẻ ngang gấu trà sữa cho chó mèo từ 6 kg đến 18kg', 4, 8, '45000', '42000', '<p>Mùa đông ? gió lạnh cận kề…<br>Áo ấm chưa có thì về với đội của Puppypet ngayy ❤️‍?</p><p>Nhà Puppy Pet có sẵn từ size 8 -&gt; size 12 phù hợp với nhiều dòng Cún. (Tham khảo bảng size ở trên hình ảnh)</p><p><img src=\"https://bizweb.dktcdn.net/100/375/956/products/size-98c37c28-35ca-4eb3-a46f-bbeba7426aa5.png?v=1700399376517\" width=\"1200\" height=\"1200\"></p><p>⭐️ Được làm từ chất liệu mềm mại, êm ái, không kích ứng da, phù hợp cho chó mèo yêu nhà bạn,nhiều size cho mọi dòng chó, mèo.</p><p>⭐️ Thiết kế thời trang, đơn giản mà phong cách. ?</p><p>⭐️ Được thiết kế trên dây chuyền hiện đại, với chất liệu tự nhiên, thích hợp cho thú cưng.&nbsp;</p><p>⭐️ Hoàn toàn yên tâm bởi các sản phẩm đều rất an toàn, dịu nhẹ. Và đặc biệt nó không gây kích ứng với da thú cưng của bạn.</p><p>Hàng có sẵn tại Puppy Pet Shop</p><p>Khi nhận hàng quý khách vui lòng kiểm tra tính nguyên vẹn và quay VIDEO CLIP khi mở hàng để tránh tình huống phát sinh. Mọi yêu cầu trả hàng nếu không cung cấp VIDEO CLIP mở hàng đều không được chấp nhận.<br>—————————————————<br>???Puppy Pet Shop ???<br>?CS1: 242 Kim Mã - Ba Đình - Hà Nội<br>☎️: 097 1111 242<br>?CS2: 32BT8 - KĐT Văn Quán - Hà Đông (Cổng trường tiểu học Ban Mai)<br>☎️: 098 1111 328<br>?HOTLINE : 091 898 5026</p>', '360106778-657810139711421-3722937013841683950-n.webp'),
(19, 'Súp thưởng Nutri Plan Stick cho mèo thanh lẻ & hộp 100g', 5, 14, '3500', '32000', '<p>Súp thưởng Nutri Plan - Nutri Stick - Thức ăn hỗn hợp hoàn chỉnh cho mèo 56g (14g x4 thanh)</p><p><br>NUTRI STICK - MÈO NGON MIỆNG HƠN, MÈO KHOẺ MẠNH HƠN</p><p>NGUYÊN LIỆU TỪ CÁ NGỪ TƯƠI NGON</p><p>Dongwon là một chuyên gia về cá ngừ đánh bắt, sử dụng nguyên liệu chất lượng cao sẽ tốt cho sức khỏe và đem đến hương vị ngon miệng.</p><p>KIỂM SOÁT CÂN NẶNG</p><p>L-Carnitine, một dẫn xuất axit amin giúp kiểm soát cân nặng cho mèo.</p><p>HỖ TRỢ SỨC KHỎE</p><p>Axit amin thiết yếu Taurine trong cá ngừ rất cần để bảo vệ sức khoẻ tim mạch của mèo.</p><p><img src=\"https://bizweb.dktcdn.net/100/375/956/files/11.jpg?v=1690626190781\" width=\"448\" height=\"500\"></p><p>&nbsp;</p><p>HƯỚNG DẪN SỬ DỤNG:<br>1. Cho ăn trực tiếp:</p><p>Thanh súp thưởng NUTRI STICK có phần easy cut rất tiện lợi, chỉ cần xé và bóp, lượng súp thưởng sẽ ra đều, vừa phải giúp cho bé mèo có thể ăn một cách vô cùng sạch sẽ và ngon miệng. Đừng quên vừa cho ăn vừa vuốt ve ẻm nữa nha.</p><p>2. Trộn cùng với thức ăn hạt:</p><p>Dù bé mèo của bạn có kén ăn, lười ăn thế nào đi nữa thì vẫn không thể cưỡng lại được vị thơm ngon của NUTRI STICK. Cá ngừ trắng thơm thơm, bùi béo, chỉ cần trộn 1 ít súp thưởng với thức ăn hạt, đảm bảo 100% bát hạt sẽ hết ngay trong tick tak hehee</p><p>3. Trộn cùng với nước:</p><p>Mèo là một giống loài rất lười uống nước. Nhưng nếu mèo không uống đủ nước thì sẽ có nguy cơ cao bị mắc những bệnh về đường tiết niệu, tiêu hoá, ảnh hưởng đến sức khoẻ lông da,... Để kích thích chúng chăm chỉ uống nước hơn, bạn cũng có thể hoà 1 chút súp thưởng NUTRI STICK với nước nhé. Các bé mèo sẽ từ lười uống nước trở thành team mê uống nước ngay đấy!</p><p><img src=\"https://bizweb.dktcdn.net/100/375/956/files/2222.jpg?v=1690626272864\" width=\"792\" height=\"807\"></p><p>&nbsp;</p>', 'web-07fcc605-7204-4288-939a-41490c1866e6-7966366d-8262-4594-ab77-ff04dab1eb2e.webp'),
(20, 'Áo thun kẻ ngang hình gấu cho chó mèo từ 6.5 kg đến 15kg', 5, 18, '75000', '60000', '<p>Mùa đông ? gió lạnh cận kề…<br>Áo ấm chưa có thì về với đội của Puppypet ngayy ❤️‍?</p><p>Nhà Puppy Pet có sẵn&nbsp;size 8, size 10 phù hợp với nhiều dòng Cún. (Tham khảo bảng size ở trên hình ảnh)</p><p><img src=\"https://bizweb.dktcdn.net/100/375/956/products/size-98c37c28-35ca-4eb3-a46f-bbeba7426aa5.png?v=1700399376517\" width=\"1200\" height=\"1200\"></p><p>⭐️ Được làm từ chất liệu mềm mại, êm ái, không kích ứng da, phù hợp cho chó mèo yêu nhà bạn,nhiều size cho mọi dòng chó, mèo.</p><p>⭐️ Thiết kế thời trang, đơn giản mà phong cách. ?</p><p>⭐️ Được thiết kế trên dây chuyền hiện đại, với chất liệu tự nhiên, thích hợp cho thú cưng.&nbsp;</p><p>⭐️ Hoàn toàn yên tâm bởi các sản phẩm đều rất an toàn, dịu nhẹ. Và đặc biệt nó không gây kích ứng với da thú cưng của bạn.</p><p>Hàng có sẵn tại Puppy Pet Shop</p><p>Khi nhận hàng quý khách vui lòng kiểm tra tính nguyên vẹn và quay VIDEO CLIP khi mở hàng để tránh tình huống phát sinh. Mọi yêu cầu trả hàng nếu không cung cấp VIDEO CLIP mở hàng đều không được chấp nhận.</p>', '296177341-1778373115834091-5175757860192800098-n.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product_img_des`
--

CREATE TABLE `tbl_product_img_des` (
  `product_id` int(11) NOT NULL,
  `product_img_des` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product_img_des`
--

INSERT INTO `tbl_product_img_des` (`product_id`, `product_img_des`) VALUES
(1, 'shopee-ce096e46-9544-489c-af31-eb28a5831db9.webp'),
(1, 'z4349038238258-0e7aadef958ccc14a8c3f65c8afd3837.webp'),
(1, 'z4349038238481-ff47eab809c971bb7eef65997fb7b260-1.webp'),
(2, 'shopee-ce096e46-9544-489c-af31-eb28a5831db9.webp'),
(2, 'z4349038238258-0e7aadef958ccc14a8c3f65c8afd3837.webp'),
(2, 'z4349038238481-ff47eab809c971bb7eef65997fb7b260-1.webp'),
(3, 'shopee-ce096e46-9544-489c-af31-eb28a5831db9.webp'),
(3, 'z4349038238258-0e7aadef958ccc14a8c3f65c8afd3837.webp'),
(3, 'z4349038238481-ff47eab809c971bb7eef65997fb7b260-1.webp'),
(4, 'shopee-ce096e46-9544-489c-af31-eb28a5831db9.webp'),
(4, 'z4349038238258-0e7aadef958ccc14a8c3f65c8afd3837.webp'),
(4, 'z4349038238481-ff47eab809c971bb7eef65997fb7b260-1.webp'),
(5, 'z4349038238258-0e7aadef958ccc14a8c3f65c8afd3837.webp'),
(5, 'z4349038238481-ff47eab809c971bb7eef65997fb7b260-1.webp'),
(8, 'dog_item-1.png'),
(8, 'đã-réize.jpg'),
(8, 'fa56adb51c468f097d623cb493df9a9c.webp'),
(7, 'Ca-khung-long-6-sung.jpg'),
(7, 'Ca-loc-nu-hoang-Thong-tin-khoa-hoc-ve-Channa-Aurantimaculata-cach-cham-soc.jpg'),
(9, '82288-banh-quy-vi-sua-180g-doggyman-03.webp'),
(9, 'banh-quy-sua-cho-cho-180g-82288-doggyman-01.webp'),
(9, 'web-c6bc4edd-3158-4b0c-af4c-366be828e8c7.webp'),
(10, 'sg-11134201-22110-6vl4w74uwhjvdc.webp'),
(10, 'sg-11134201-22110-c4d2g84uwhjv5f.webp'),
(10, 'sg-11134201-23020-t0mhjqshxanv82.webp'),
(11, 'sg-11134201-22110-6vl4w74uwhjvdc.webp'),
(11, 'sg-11134201-22110-c4d2g84uwhjv5f.webp'),
(11, 'sg-11134201-23020-t0mhjqshxanv82.webp'),
(13, '16925421-1d68-42c4-b337-5070fab856b3.webp'),
(13, 'z4769936240863-60386889c3579bb46ba62dd4ac9470eb.webp'),
(14, '15762013410564l8vha.webp'),
(14, 'o1cn01uiz4kh1mh4ryiyewg-115544928.webp'),
(14, 'o1cn014n3wj22bdhy8pxpyr-12248304.webp'),
(15, '20230510-225806.webp'),
(15, '20230510-230025.webp'),
(15, 'z4611404552269-64fb796e79d13cf06ebecf28af7e434b.webp'),
(16, '2-jpeg.webp'),
(16, '4-jpeg.webp'),
(16, '6-jpeg.webp'),
(6, 'shopee-ce096e46-9544-489c-af31-eb28a5831db9.webp'),
(6, 'z4349038238258-0e7aadef958ccc14a8c3f65c8afd3837.webp'),
(6, 'z4349038238481-ff47eab809c971bb7eef65997fb7b260-1.webp'),
(17, 'shopee-ce096e46-9544-489c-af31-eb28a5831db9.webp'),
(17, 'z4349038238258-0e7aadef958ccc14a8c3f65c8afd3837.webp'),
(17, 'z4349038238481-ff47eab809c971bb7eef65997fb7b260-1.webp'),
(18, 'sg-11134201-7qvcr-lk6b23lvzmky10.webp'),
(18, 'sg-11134201-7qvcy-lk6b23b2fgnea3.webp'),
(18, 'sg-11134201-7qvd6-lk6b23xtjlav39.webp'),
(12, '16925421-1d68-42c4-b337-5070fab856b3.webp'),
(12, 'z4769936240863-60386889c3579bb46ba62dd4ac9470eb.webp'),
(19, '11-d1816e54-5c55-4c97-94bc-e61792ea5069-393c88ca-d9c8-4726-8609-6f5b463fc977.webp'),
(19, '79d5119bca130a274704852a7b256761-94b65002-51d5-4c07-a1f8-d1fcfe3c341b.webp'),
(19, '3333-c6f562a5-0f71-4183-8450-c09ecee9c957.webp'),
(20, 'size-056811cc-32de-47a7-974f-ac2ae02f6cdd.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_img` varchar(255) NOT NULL,
  `service_price` varchar(50) NOT NULL,
  `service_url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `service_name`, `service_img`, `service_price`, `service_url`) VALUES
(1, 'Dịch vụ trông giữ chó mèo', 'trong-giu-cho-meo_1612248539.jpg', '60000', 'servicetronggiu.php'),
(2, 'Chăm sóc thú cưng', 'cham-soc-thu-cung_1612248557.jpg', '300000', 'servicechamsocthucung.php'),
(3, 'Cứu hộ thú cưng', 'cuu-ho-thu-cung_1612248570.jpg', '350000', 'servicecuuhothucung.php'),
(4, 'Spa cho thú cưng', 'dich-vu-spa-cho-cho-meo_1612248623.jpg', '150000', 'servicespathucung.php'),
(5, 'Dịch vụ tắm cho chó mèo', 'tam-cho-cho-meo_1612248603.jpg', '100000', 'servicetamthucung.php'),
(6, 'Dịch vụ cắt tỉa lông chó mèo', 'cat-tia-long-cho-meo_1612248645.jpg', '250000', 'servicecattialong.php');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_service_register`
--

CREATE TABLE `tbl_service_register` (
  `ser_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ser_name` varchar(20) NOT NULL,
  `ser_email` varchar(30) NOT NULL,
  `ser_time` date NOT NULL,
  `ser_sdt` varchar(30) NOT NULL,
  `ser_diachi` varchar(50) NOT NULL,
  `ser_info` varchar(50) NOT NULL,
  `ser_total` varchar(50) NOT NULL,
  `ser_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_service_register`
--

INSERT INTO `tbl_service_register` (`ser_id`, `service_id`, `user_id`, `ser_name`, `ser_email`, `ser_time`, `ser_sdt`, `ser_diachi`, `ser_info`, `ser_total`, `ser_status`) VALUES
(43, 2, 2, 'Minh Tùng', 'ca7nh9@gma', '2023-12-28', '0329723748', 'Thái Bình', 'Chăm sóc cơ bản', '300.000₫', 0),
(44, 2, 2, 'Minh Tùng', 'ca7nh9@gma', '2023-12-28', '0329723748', 'Thái Bình', 'Chăm sóc toàn diện', '450.000₫', 0),
(45, 1, 2, 'Minh Tùng', 'ca7nh9@gma', '2023-12-28', '0329723748', 'Thái Bình', '20', '1.200.000₫', 0),
(46, 3, 2, 'Minh Tùng', 'ca7nh9@gma', '2023-12-28', '0329723748', 'Thái Bình', 'Đặt lịch', '250.000₫', 0),
(47, 4, 2, 'Minh Tùng', 'ca7nh9@gma', '2023-12-28', '0329723748', 'Thái Bình', 'Spa toàn diện', '350.000₫', 0),
(48, 5, 2, 'Minh Tùng', 'ca7nh9@gma', '2023-12-28', '0329723748', 'Thái Bình', 'Tắm Combo', '400.000₫', 0),
(49, 6, 2, 'Minh Tùng', 'ca7nh9@gma', '2023-12-28', '0329723748', 'Thái Bình', 'Cắt tỉa cơ bản', '320.000₫', 0),
(50, 2, 15, 'Nguyên', '3rrdw', '2023-12-28', '01686152464', 'Thanh Hóa', 'Chăm sóc toàn diện', '450.000₫', 0),
(54, 1, 29, 'Nguyễn Văn A', 'tẻgerfgwaf', '2023-12-28', '53452353', 'Lào Cai', '3', '180.000₫', 0),
(55, 2, 29, 'Nguyễn Văn A', 'tẻgerfgwaf', '2023-12-28', '53452353', 'Lào Cai', 'Chăm sóc cơ bản', '300.000₫', 0),
(56, 5, 29, 'Nguyễn Văn A', 'tẻgerfgwaf', '2023-12-28', '53452353', 'Lào Cai', 'Sạch toàn thân', '500.000₫', 0),
(57, 1, 2, 'Minh Tùng', 'ca7nh9@gma', '2023-12-28', '0329723748', 'Thái Bình', '1', '60.000₫', 0),
(58, 5, 2, 'Minh Tùng', 'ca7nh9@gma', '2023-12-28', '0329723748', 'Thái Bình', 'Chỉ tắm', '100.000₫', 0),
(60, 2, 15, 'Minh Tùng', 'ca7nh9@gma', '2023-12-30', '0329723748', 'Thái Bình', 'Chăm sóc lẻ', '150.000₫', 0),
(62, 1, 15, 'Minh Tùng', 'ca7nh9@gma', '2023-12-30', '0329723748', 'Thái Bình', '1', '60.000₫', 0),
(63, 1, 0, 'Minh Tùng', 'ca7nh9@gma', '2023-12-31', '0329723748', 'Thái Bình', '1', '60.000₫', 0),
(64, 2, 15, 'Minh Tùng', 'ca7nh9@gma', '2023-12-31', '0329723748', 'Thái Bình', 'Chăm sóc lẻ', '150.000₫', 1),
(66, 3, 15, 'Minh Tùng', 'ca7nh9@gma', '2023-12-31', '0329723748', 'Thái Bình', 'Đặt lịch', '250.000₫', 0),
(67, 5, 15, 'Minh Tùng', 'ca7nh9@gma', '2023-12-31', '0329723748', 'Thái Bình', 'Chỉ tắm', '100.000₫', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thongke`
--

CREATE TABLE `tbl_thongke` (
  `id` int(11) NOT NULL,
  `ngaydat` varchar(30) NOT NULL,
  `donhang` int(11) NOT NULL,
  `doanhthu` varchar(50) DEFAULT NULL,
  `soluongdon` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_thongke`
--

INSERT INTO `tbl_thongke` (`id`, `ngaydat`, `donhang`, `doanhthu`, `soluongdon`) VALUES
(1, '2022-12-28', 50, '35500000', 25),
(2, '2022-01-03', 55, '38000000', 30),
(3, '2023-01-01', 45, '42000000', 30),
(4, '2022-12-20', 38, '37000000', 28),
(5, '2023-01-05', 45, '56000000', 58),
(6, '2022-12-30', 55, '44000000', 42),
(7, '2023-12-27', 86, '45000000', 54),
(8, '2023-12-24', 60, '27000000', 32),
(9, '2023-12-01', 45, '22000000', 32),
(10, '2023-12-15', 22, '4000000', 12),
(11, '2023-10-22', 18, '3200000', 11),
(12, '2023-12-28', 45, '28000000', 25),
(13, '2023-12-29', 18, '10000000', 12),
(14, '2023-12-30', 39, '15060000', 27),
(15, '2023-12-31', 4, '410000', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `user_address` varchar(50) DEFAULT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_sdt` varchar(30) DEFAULT NULL,
  `user_username` varchar(20) NOT NULL,
  `user_password` varchar(20) NOT NULL,
  `user_role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_address`, `user_email`, `user_sdt`, `user_username`, `user_password`, `user_role`) VALUES
(1, 'Minh Tùng', 'Thái Bình', '20212453@eaut.edu.vn', '0329723748', 'admin', 'admin', 1),
(2, 'Minh Tùng', 'Thái Bình', 'ca7nh9@gmail.com', '0329723748', 'minhtung', '123', 0),
(15, 'Minh Tùng', 'Hưng Yên', 'ca7nh9@gmail.com', '0329723748', 'minhtung12', '1', 0),
(31, 'Hiệp', 'Hà Nội', 'hiep@gmail.com', '5353453', 'hiep', '1', 0),
(32, 'Nguyên', 'Hà Nội', 'nguyen@gmail.com', '53453453', 'nguyen', '1', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Chỉ mục cho bảng `tbl_service_register`
--
ALTER TABLE `tbl_service_register`
  ADD PRIMARY KEY (`ser_id`);

--
-- Chỉ mục cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_service_register`
--
ALTER TABLE `tbl_service_register`
  MODIFY `ser_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT cho bảng `tbl_thongke`
--
ALTER TABLE `tbl_thongke`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
