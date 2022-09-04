@extends('layouts.backend')

@push('css-external')
   {{-- full Calendar --}}
   <meta name="csrf-token" content="{{ csrf_token() }}">
   
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

   
@endpush

@section('title')
    Kegiatan | {{ config('app.name') }}
@endsection

@section('title-page')
    Kegiatan
@endsection

@section('content-header')
<center><h2>Form Pemeran</h2></center>
<a href="{{ route('kegiatan.create') }}" class="btn btn-secondary">Tambah Data</a>
<div class="card-body px-0 pt-0 pb-2">

  <div id='calendar' class="mt-8"></div>

    {{-- <div class="table-responsive p-0">
      <table class="table align-items-center mb-0 table-dark">
        <thead>
          <tr>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">No</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Tanggal</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Jenis Kegiatan</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Imam</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Penceramah</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Pengurus</th>
            <th class="text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7 ps-2">Keterangan</th>
            <th class="text-center text-uppercase text-secondary text-center text-xxs font-weight-bolder opacity-7">Apsi</th>
          </tr>
        </thead>
        <tbody>
          @foreach($kegiatans as $del)
          <tr>
          <td scope="row" class="text-center">{{ $loop->iteration }}</td>
          <td class="text-center">{{ $del->tgl }}</td>
          <td class="text-center">{{ $del->nama }}</td>
          <td class="text-center">{{ $del->jeniskegiatan->jenis_kegiatan }}</td>
          <td class="text-center">{{ $del->lacon->nama }}</td>
          <td class="text-center">{{ $del->penceramah->nama }}</td>
          <td class="text-center">{{ $del->pengurus->nama }}</td>
          <td class="text-center">{{ $del->keterangan }}</td>
          <td class="text-center">
            <a href="{{ route('lacon.edit', ['lacon' => $del]) }}" class="btn btn-primary btn-sm">
              <i class="fas fa-edit"></i>
            </a>
            <form action="{{ route('lacon.destroy', ['lacon' => $del]) }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apa kamu yakin menghapus data ini,,  Nah Ayoloh')">
                  <i class="fas fa-trash"></i>
                </button>
            </form>
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div> --}}
  </div>


  <!-- Modal -->
<div class="modal fade" id="detailKegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Kegiatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="dataKegiatan"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>

@endsection

@push('javascript-external')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script type="text/javascript">

  

  $(document).ready(function () {
  
        
  
      /*------------------------------------------
  
      --------------------------------------------
  
      Get Site URL
  
      --------------------------------------------
  
      --------------------------------------------*/
  
      var SITEURL = "{{ url('/') }}";
  
      
  
      /*------------------------------------------
  
      --------------------------------------------
  
      CSRF Token Setup
  
      --------------------------------------------
  
      --------------------------------------------*/
  
      $.ajaxSetup({
  
          headers: {
  
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  
          }
  
      });
  
        
  
      /*------------------------------------------
  
      --------------------------------------------
  
      FullCalender JS Code
  
      --------------------------------------------
  
      --------------------------------------------*/

      // var start_date = $('#calendar').fullCalendar('getView').start;

      var calendar = $('#calendar').fullCalendar({
  
                      editable: true,
  
                      events: function(start, end, timezone, callback) {

                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
  
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");


                        $.ajax({
                            url: '/dashboard/kegiatan',
                            dataType: 'json',
                            data: {
                              // If you have some data to send to loadCalendarEvents.php
                                start: start,
                                end:  end
                            },
                            success: function(data) {

                                  console.log(data);

                                  var events = [];
                                  
                                  for (var i=0; i<data.length; i++){
                                      events.push({
                                            id:data[i]['id'],
                                            title: data[i]['nama'],
                                            start: data[i]['tgl_mulai'],
                                            end: data[i]['tgl_selesai'],
                                      });
                                  }

                                  //adding the callback
                                  callback(events);
                              }
                          });
                      },
  
                      displayEventTime: false,
  
                      editable: true,
  
                      eventRender: function (event, element, view) {
  
                          if (event.allDay === 'true') {
  
                                  event.allDay = true;
  
                          } else {
  
                                  event.allDay = false;
  
                          }
  
                      },
  
                      selectable: true,
  
                      selectHelper: true,
  
                      select: function (start, end, allDay) {
  
                          var title = prompt('Event Title:');

                          // var pengurus = prompt('Pengurus');
  
                          if (title) {
  
                              var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
  
                              var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
  
                              $.ajax({
  
                                  url: SITEURL + "/dashboard/kegiatan_ajax",
  
                                  data: {
  
                                      nama: title,
  
                                      tgl_mulai: start,
  
                                      tgl_selesai: end,
  
                                      type: 'add'
  
                                  },
  
                                  type: "POST",
  
                                  success: function (data) {
  
                                      displayMessage("Event Created Successfully");
  
                                      calendar.fullCalendar('renderEvent',
  
                                          {
  
                                            title: nama,
  
                                            start: tgl_mulai,

                                            end: tgl_selesai,
  
                                            allDay: allDay
  
                                          },true);
  
  
                                      calendar.fullCalendar('unselect');
  
                                  }
  
                              });
  
                          }
  
                      },
  
                      eventDrop: function (event, delta) {
  
                          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
  
                          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
  
    
  
                          $.ajax({
  
                              url: SITEURL + '/dashboard/kegiatan_ajax',
  
                              data: {
  
                                  nama: event.nama,
  
                                  tgl_mulai: tgl_mulai,
  
                                  tgl_selesai: tgl_selesai,
  
                                  id: event.id,
  
                                  type: 'update'
  
                              },
  
                              type: "POST",
  
                              success: function (response) {
  
                                  displayMessage("Event Updated Successfully");
  
                              }
  
                          });
  
                      },
  
                      eventClick: function (event) {
  
                          // var deleteMsg = confirm("Do you really want to delete?");

                              $.ajax({
  
                                  type: "GET",
  
                                  url: SITEURL + '/dashboard/single_kegiatan',
  
                                  data: {
                                      id: event.id,
                                  },
  
                                  success: function (response) {

                                    console.log(response);

                                    $('#detailKegiatan').modal('show')
  
                                    $('#dataKegiatan').html(`
                                      
                                        <table>
                                            <tr>
                                              <td style='font-weight:bold; width:200px; margin-top:20px'>Judul Kegiatan</td>
                                              <td>${response.nama}</td>
                                            </tr>

                                            <tr>
                                              <td style='font-weight:bold; width:200px; margin-top:20px''>Lacon</td>
                                              <td>${response.lacon.nama}</td>
                                            </tr>

                                            <tr>
                                              <td style='font-weight:bold; width:200px; margin-top:20px''>Pengurus</td>
                                              <td>${response.pengurus.nama}</td>
                                            </tr>

                                            <tr>
                                              <td style='font-weight:bold; width:200px; margin-top:20px''>Penceramah</td>
                                              <td>${response.penceramah.nama}</td>
                                            </tr>

                                            <tr>
                                              <td style='font-weight:bold; width:200px; margin-top:20px''>Judul Kegiatan</td>
                                              <td>${response.jeniskegiatan.jenis_kegiatan}</td>
                                            </tr>
                                        </table>

                                    `)
  
                                  }
  
                              });
  
                          
  
                      }
  
   
  
                  });
  
   
  
      });
  
        
  
      /*------------------------------------------
  
      --------------------------------------------
  
      Toastr Success Code
  
      --------------------------------------------
  
      --------------------------------------------*/
  
      function displayMessage(message) {
  
          toastr.success(message, 'Event');
  
      } 
  
      
  
  </script>
@endpush