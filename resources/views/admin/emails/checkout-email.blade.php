
<font face="Arial">
	<div>
	<div></div>
		<h3><font color="#FF9600">Thông tin khách hàng</font></h3>
		<p>
			<strong class="info">Customer Name: </strong>
			{{$data->$uid}}
		</p>
		<p>
			<strong class="info">Email: </strong>
			{{$info['customer_email']}}
		</p>
		<p>
			<strong class="info">Phone Number: </strong>
			{{$info['customer_phone']}}
		</p>
		<p>
			<strong class="info">Address: </strong>
			{{$info['customer_address']}}
		</p>
		<p>
			<strong class="info">Note: </strong>
			{{$info['customer_note']}}
		</p>
	</div>
	<div>
		<h3><font color="#FF9600">Bill</font></h3>
		<table border="1" cellspacing="0">
			<tr>
				<td><strong>Product name</strong></td>
				<td><strong>Price</strong></td>
				<td><strong>Quantity</strong></td>
				<td><strong>Total</strong></td>
			</tr>
			@foreach($cart as $item)
			<tr>
				<td>{{$item->name}}</td>
				<td>{{number_format($item->price)}} VNĐ</td>
				<td>{{$item->qty}}</td>
				<td>{{number_format($item->price*$item->qty,0,',','.')}}</td>
			</tr>
			@endforeach
			<tr>
				<td>Total:</td>
				<td colspan="3" align="right">{{$total}}VNĐ</td>
			</tr>
		</table>
	</div>
		<div>
			<h3><font color="#FF9600">Order successful!</font></h3>
			<p>• Your order and contact information has been forwarded to the Email written in the order.</p>
			<p>• We estimate your order will arrive at the specified address within 2-3 business days.</p>
			<p>• The delivery person will contact you within 24 hours of order placement.</p>
			<p>• Trụ sở chính: 391A Đ. Nam Kỳ Khởi Nghĩa, Phường 8, Quận 3, Thành phố Hồ Chí Minh</p>
			<p> Thank you for buying our product!</p>
		</div>
	</div>
		<!-- end main -->
	</div>
</div>
</font>
