import React, { Component } from 'react';
import FullCalendar from "@fullcalendar/react"
import daygridPlugin from "@fullcalendar/daygrid"
import interactionPlugin from "@fullcalendar/interaction"
import listPlugin from '@fullcalendar/list'
import $ from 'jquery';
import './App.scss'




class fullCalendar extends React.Component {



  render() {

    return (

      <div id='calendar'>

        <head>
       
<script>

  $(document).ready(function() {
    $("#calendar").fullCalendar({
      header: {
        left: "prev,next today",
        center: "title",
        right: "month,agendaWeek,agendaDay"
      },
      defaultView: "month",
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectHelper: false,
      editable: true,
      eventLimit: true, // allow "more" link when too many events
  
      select: function(start, end) {
        var title = prompt("Event Content:");
        var eventData;
        if (title) {
          eventData = {
            title: title,
            start: start,
            end: end
          };
          $("#calendar").fullCalendar("renderEvent", eventData, true); // stick? = true
        }
        $("#calendar").fullCalendar("unselect");
      },
  
      eventRender: function(event, element) {
        element
          .find(".fc-content")
          .prepend("<span class='closeon material-icons'>&#xe5cd;</span>");
        element.find(".closeon").on("click", function() {
          $("#calendar").fullCalendar("removeEvents", event._id);
        });
      },
  
      eventClick: function(calEvent) {
        var title = prompt("Edit Event Content:", calEvent.title);
        calEvent.title = title;
        $("#calendar").fullCalendar("updateEvent", calEvent);
      }
    })
  });

</script>
</head>
        <div class="dropdown">
          <div class="dropdown-content">
            <p>Click a calendar date to invoke a prompt box.</p>
            <p>Add text to input and click "OK."</p>
            <p>Click event to re-enable editing. Add new text and click "OK".</p>
            <p>Click "x" to delete event.</p>
          </div>
          <button>yet</button>
        </div>
      </div>
      // <div>

      //   <div className="modal-footer">
      //     <button type="button" className="btn btn-success" data-toggle="modal" data-target="#addEvent">Add event</button>
      //     <button type="button" className="btn btn-success" data-toggle="modal" data-target="#addEvent">Delete event</button>
      //   </div>

      //   <FullCalendar

      //     plugins={[daygridPlugin, interactionPlugin, listPlugin]}

      //     initialView="dayGridMonth"
      //     selectable={true}
      //     headerToolbar={{
      //       left: 'prev,next today',
      //       center: 'title',
      //       right: 'dayGridMonth,dayGridWeek,dayGridDay,listWeek'
      //     }}
      //     events={[
      //       { title: 'event 1', date: '2020-08-13' },
      //       { title: 'event 2', date: '2020-08-15' },
      //       { title: 'event 2', date: '2020-08-15' },
      //       { title: 'event 2', date: '2020-08-15' },
      //       { title: 'event 2', date: '2020-08-15' },
      //       { title: 'event 2', date: '2020-08-15' },
      //       { title: 'event 2', date: '2020-08-15' }
      //     ]}

      //   />

      // </div>
    )



  }
}

export default fullCalendar;

