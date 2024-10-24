import { useState, useEffect } from 'react';

function Settings() {
    const [settings, setSettings] = useState({});

    useEffect(() => {
        fetch(CDP_SETTINGS.apiUrl + 'settings', {
            headers: {
                'X-WP-Nonce': CDP_SETTINGS.nonce,
            }
        })
            .then(res => res.json())
            .then(data => setSettings(data));
    }, []);

    const handleSave = () => {
        fetch(CDP_SETTINGS.apiUrl + 'settings', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-WP-Nonce': CDP_SETTINGS.nonce,
            },
            body: JSON.stringify(settings)
        })
            .then(response => {
                if (response.ok) {
                    alert('Settings saved!');
                }
            });
    };

    return (
        <div>
            <h2>Settings</h2>
            <input
                type="text"
                value={settings.someOption || ''}
                onChange={(e) => setSettings({ ...settings, someOption: e.target.value })}
            />
            <button onClick={handleSave}>Save</button>
        </div>
    );
}

export default Settings;
