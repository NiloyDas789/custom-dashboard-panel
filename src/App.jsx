import React from 'react';
import Dashboard from './components/Dashboard';
import Header from './components/Header';
import Sidebar from './components/Sidebar';
import './css/index.css';

const App = () => {
    return (
        <div className="app">
            <Header />
            <div className="main-content">
                <Sidebar />
                <Dashboard />
            </div>
        </div>
    );
};

export default App;
