import { useState } from 'react';
import Dashboard from './components/Dashboard';
import Settings from './components/Settings';

function App() {
    const [view, setView] = useState('dashboard');

    return (
        <div>
            <h1>Custom Dashboard Panel</h1>
            <nav>
                <button onClick={() => setView('dashboard')}>Dashboard</button>
                <button onClick={() => setView('settings')}>Settings</button>
            </nav>
            {view === 'dashboard' ? <Dashboard /> : <Settings />}
        </div>
    );
}

export default App;
