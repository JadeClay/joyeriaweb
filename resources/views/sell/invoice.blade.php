<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Joyerias Brador || Factura {{ $invoice->id }}</title>

		<style>
			.invoice-box {
				max-width: 800px;
				margin: auto;
				padding: 30px;
				border: 1px solid #eee;
				box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
				font-size: 16px;
				line-height: 24px;
				font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
				color: #555;
			}

			.invoice-box table {
				width: 100%;
				line-height: inherit;
				text-align: left;
			}

			.invoice-box table td {
				padding: 5px;
				vertical-align: top;
			}

			.invoice-box table tr td:nth-child(2) {
				text-align: right;
			}

			.invoice-box table tr.top table td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.top table td.title {
				font-size: 45px;
				line-height: 45px;
				color: #333;
			}

			.invoice-box table tr.information table td {
				padding-bottom: 40px;
			}

			.invoice-box table tr.heading td {
				background: #eee;
				border-bottom: 1px solid #ddd;
				font-weight: bold;
			}

			.invoice-box table tr.details td {
				padding-bottom: 20px;
			}

			.invoice-box table tr.item td {
				border-bottom: 1px solid #eee;
			}

			.invoice-box table tr.item.last td {
				border-bottom: none;
			}

			.invoice-box table tr.total td:nth-child(2) {
				border-top: 2px solid #eee;
				font-weight: bold;
			}

			@media only screen and (max-width: 600px) {
				.invoice-box table tr.top table td {
					width: 100%;
					display: block;
					text-align: center;
				}

				.invoice-box table tr.information table td {
					width: 100%;
					display: block;
					text-align: center;
				}
			}

			/** RTL **/
			.invoice-box.rtl {
				direction: rtl;
				font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
			}

			.invoice-box.rtl table {
				text-align: right;
			}

			.invoice-box.rtl table tr td:nth-child(2) {
				text-align: left;
			}
		</style>
	</head>

	<body>
		<div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="{{ URL::asset('images/logo.png') }}" style="width: 100%; max-width: 300px" />
								</td>

								<td>
									Factura #: {{ $invoice->id }}<br />
									Fecha de Emisión: {{ $invoice->date }}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Joyerias Brador, SRL<br />
                                    Avenida Plaza Las Américas. <br />
                                    Winston Churchill esquina Roberto Pastoriza.<br />
                                    Santo Domingo, República Dominicana<br />

                                    TEL: (809) 547-7107
								</td>

								<td>
									<strong>Cliente:</strong><br />
									{{ $clients->find($invoice->client_id)->name }} {{ $clients->find($invoice->client_id)->surname }}<br />
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Precio</td>
				</tr>

				<tr class="item">
					<td>
                        <?php 
                            if($invoice->hasOrder){
                                $id = $invoice->product_id;
                                $name = $orders->find($id)->name;
                                $link = "<a href=" . route('sell.show', $invoice->id) . ">[PEDIDO] </a>";
                                echo $link . $name;
                            } else {
                                $id = $invoice->product_id;
                                $name = $products->find($id)->name;
                                echo $name;
                            }
                        ?>
                    </td>

					<td>RD${{ $invoice->amount }}</td>
				</tr>

				<tr class="heading">
					<td>Impuesto sobre Transacciones de Bienes y Servicios</td>

					<td>(I2)</td>
				</tr>

				<tr class="details">
					<td>18%</td>

					<td>RD${{ $invoice->itbis }}</td>
				</tr>

				<tr class="total">
					<td>Total: RD${{ $invoice->subtotal }}</td>

					<td>Pago Inicial: RD${{ $orders->find($invoice->product_id)->initial }} <br /> Restante: RD${{ $invoice->subtotal - $orders->find($invoice->product_id)->initial }}</td>
				</tr>
			</table>
		</div>
	</body>
</html>