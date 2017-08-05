<?php 
switch ($sat[1]) {
							case '(STRP)':
								?>
									<option value="STRP" selected>Strip</option>
									<option value="BTL">Botol</option>
									<option value="SRBK">Serbuk</option>
									<option value="KPSL">Kapsul</option>
									<option value="SRUP">Sirup</option>
								<?php
								break;
							case '(BTL)':
								?>
									<option value="STRP" >Strip</option>
									<option value="BTL" selected>Botol</option>
									<option value="SRBK">Serbuk</option>
									<option value="KPSL">Kapsul</option>
									<option value="SRUP">Sirup</option>
								<?php
								break;
							case '(SRBK)':
								?>
									<option value="STRP" >Strip</option>
									<option value="BTL" >Botol</option>
									<option value="SRBK" selected>Serbuk</option>
									<option value="KPSL">Kapsul</option>
									<option value="SRUP">Sirup</option>
								<?php
								break;
							case '(KPSL)':
								?>
									<option value="STRP" >Strip</option>
									<option value="BTL" >Botol</option>
									<option value="SRBK" >Serbuk</option>
									<option value="KPSL" selected>Kapsul</option>
									<option value="SRUP">Sirup</option>
								<?php
								break;
							case '(SRUP)':
								?>
									<option value="STRP" >Strip</option>
									<option value="BTL" >Botol</option>
									<option value="SRBK" >Serbuk</option>
									<option value="KPSL" >Kapsul</option>
									<option value="SRUP" selected>Sirup</option>
								<?php
								break;
						}

 ?>