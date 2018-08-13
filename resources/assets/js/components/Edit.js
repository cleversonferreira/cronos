import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class Edit extends Component {

    constructor(){
        super();
        this.state = {
            name: '',
            deadline_start: '',
            deadline_end: '',
            progress: ''
        }
    }

    componentWillMount(){
        let id = this.props.id

        axios.get('/cronos/' + id).then(response => {
            let cronos = response.data
            this.setState({
                name: cronos.name,
                deadline_start: cronos.deadline_start,
                deadline_end: cronos.deadline_end,
                progress: cronos.progress
            })
        }).catch(error => {
            console.log(error)
        })
    }

    handleNameChange(e){
        this.setState({
            name: e.target.value
        })
    }

    handleDeadLineStartChange(e){
        this.setState({
            deadline_start: e.target.value
        })
    }

    handleDeadLineEndChange(e){
        this.setState({
            deadline_end: e.target.value
        })
    }

    handleProgressChange(e){
        this.setState({
            progress: e.target.value
        })
    }

    handleSubmit(e){
        e.preventDefault();
        console.log(this.props.id)
        console.log(this.state);

        axios.post('/cronos/update/' + this.props.id, this.state).then(response => {
            window.alert('Projeto atualizado com sucesso.')
        }).catch(error => {
            window.alert('Algo deu errado, por favor tente novamente.')
            console.log(error)
        })
    }

    render() {
        return (

            <form method="post" onSubmit={this.handleSubmit.bind(this)}>
                <div className="form-group">
                    <label htmlFor="name">Nome</label><br/>
                    <input type="text" placeholder="Nome" name="name" value={this.state.name} onChange={this.handleNameChange.bind(this)}/>
                </div>
                <div className="form-group">
                    <label htmlFor="sku">Deadline Start</label><br/>
                    <input type="text" placeholder="Deadline Start" name="deadline_start" value={this.state.deadline_start} onChange={this.handleDeadLineStartChange.bind(this)}/>
                </div>
                <div className="form-group">
                    <label htmlFor="sku">Deadline End</label><br/>
                    <input type="text" placeholder="Deadline End" name="deadline_end" value={this.state.deadline_end} onChange={this.handleDeadLineEndChange.bind(this)}/>
                </div>
                <div className="form-group">
                    <label htmlFor="sku">Progress</label><br/>
                    <input type="text" placeholder="Progress" name="progress" value={this.state.progress} onChange={this.handleProgressChange.bind(this)}/>
                </div>
                <button className="btn btn-dark" type="submit">Atualizar</button>
            </form>
        );
    }
}

if (document.getElementById('edit')) {
    var id = $("#edit").data("id");

    ReactDOM.render(<Edit id={id}/>, document.getElementById('edit'));
}