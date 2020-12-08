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
      <div>

      <head></head>
        <div className="modal-footer">
          <button type="button" className="btn btn-success" data-toggle="modal" data-target="#addEvent">Add event</button>
          <button type="button" className="btn btn-success" data-toggle="modal" data-target="#addEvent">Delete event</button>
        </div>

        <FullCalendar

          plugins={[daygridPlugin, interactionPlugin, listPlugin]}

          initialView="dayGridMonth"
          selectable={true}
          headerToolbar={{
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,dayGridWeek,dayGridDay,listWeek'
          }}
          events={[
            { title: 'event 1', date: '2020-12-13' },
            { title: 'event 2', date: '2020-12-15' },
            { title: 'event 2', date: '2020-12-15' },
            { title: 'event 2', date: '2020-12-15' },
            { title: 'event 2', date: '2020-12-15' },
            { title: 'event 2', date: '2020-12-15' },
            { title: 'event 2', date: '2020-12-15' }
          ]}

        />

      </div>
    )



  }
}

export default fullCalendar;

