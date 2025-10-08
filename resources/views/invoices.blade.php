@push('styles')
  <link rel="stylesheet" href="{{ asset('css/invoices.css') }}">
@endpush
<x-layout title="invoices">
  <div class="invoices">
    <div class="overview">
      <h2>Overview</h2>
      <div class="boxes">
        <x-card number="1597" title="Total Invoices" src="admin/upwork.jpg" />
        <x-card number="1597" title="Total Invoices" src="admin/upwork.jpg" />
        <x-card number="1597" title="Total Invoices" src="admin/upwork.jpg" />
        <x-card number="1597" title="Total Invoices" src="admin/upwork.jpg" />
      </div>
    </div>
    <div class="invoices-list">
      <div class="invoices-box">
        <h2>Invoices List</h2>
        <a href="{{route('invoice.create')}}" class="create-btn">New Invoice</a>
      </div>
      <div class="table" id="customers_table">
        <section class="table__body">
          <table>
            <thead>
              <tr>
                <th>Id <span class="icon-arrow">&UpArrow;</span></th>
                <th>Invoice Titile <span class="icon-arrow">&UpArrow;</span></th>
                <th>Customer <span class="icon-arrow">&UpArrow;</span></th>
                <th>Amount <span class="icon-arrow">&UpArrow;</span></th>
                <th>Status <span class="icon-arrow">&UpArrow;</span></th>
                <th>Date <span class="icon-arrow">&UpArrow;</span></th>
                <th>Actions <span class="icon-arrow">&UpArrow;</span></th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1</td>
                <td>Invoice Title</td>
                <td>
                  <img src="{{asset('admin/upwork.jpg')}}" alt="" />Zinzu Chan Lee
                </td>
                <td><strong> $128.90 </strong></td>
                <td>
                  <p class="status delivered">Delivered</p>
                </td>
                <td>27 Aug, 2023</td>
                <td>
                  <a href="#" class="table-btn edit">Edit</a>
                  <a href="#" class="table-btn danger">Delete</a>
                </td>
              </tr>
              {{-- <tr>
                <td>2</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Jeet Saru</td>
                <td>Kathmandu</td>
                <td>27 Aug, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$5350.50</strong></td>
              </tr>
              <tr>
                <td>3</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Sonal Gharti</td>
                <td>Tokyo</td>
                <td>14 Mar, 2023</td>
                <td>
                  <p class="status shipped">Shipped</p>
                </td>
                <td><strong>$210.40</strong></td>
              </tr>
              <tr>
                <td>4</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alson GC</td>
                <td>New Delhi</td>
                <td>25 May, 2023</td>
                <td>
                  <p class="status delivered">Delivered</p>
                </td>
                <td><strong>$149.70</strong></td>
              </tr>
              <tr>
                <td>5</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Sarita Limbu</td>
                <td>Paris</td>
                <td>23 Apr, 2023</td>
                <td>
                  <p class="status pending">Pending</p>
                </td>
                <td><strong>$399.99</strong></td>
              </tr>
              <tr>
                <td>6</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alex Gonley</td>
                <td>London</td>
                <td>23 Apr, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$399.99</strong></td>
              </tr>
              <tr>
                <td>7</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Jeet Saru</td>
                <td>New York</td>
                <td>20 May, 2023</td>
                <td>
                  <p class="status delivered">Delivered</p>
                </td>
                <td><strong>$399.99</strong></td>
              </tr>
              <tr>
                <td>8</td>
                <td>
                  <img src="{{asset('admin/upwork.jpg')}}" alt="" /> Aayat Ali Khan
                </td>
                <td>Islamabad</td>
                <td>30 Feb, 2023</td>
                <td>
                  <p class="status pending">Pending</p>
                </td>
                <td><strong>$149.70</strong></td>
              </tr>
              <tr>
                <td>9</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alson GC</td>
                <td>Dhaka</td>
                <td>22 Dec, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$249.99</strong></td>
              </tr>
              <tr>
                <td>9</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alson GC</td>
                <td>Dhaka</td>
                <td>22 Dec, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$249.99</strong></td>
              </tr>
              <tr>
                <td>9</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alson GC</td>
                <td>Dhaka</td>
                <td>22 Dec, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$249.99</strong></td>
              </tr>
              <tr>
                <td>9</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alson GC</td>
                <td>Dhaka</td>
                <td>22 Dec, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$249.99</strong></td>
              </tr>
              <tr>
                <td>9</td>
                <td><img src="{{asset('admin/upwork.jpg')}}" alt="" /> Alson GC</td>
                <td>Dhaka</td>
                <td>22 Dec, 2023</td>
                <td>
                  <p class="status cancelled">Cancelled</p>
                </td>
                <td><strong>$249.99</strong></td>
              </tr> --}}
            </tbody>
          </table>
        </section>
      </div>
    </div>
  </div>
</x-layout>