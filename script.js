document.addEventListener('DOMContentLoaded', () => {
    Object.assign(document.body.style, {
      fontFamily: 'Segoe UI, sans-serif',
      margin: '0',
      padding: '0',
      backgroundColor: '#f4f6f8',
      color: '#333',
      lineHeight: '1.6',
      opacity: '0',
      transition: 'opacity 0.5s ease'
    });
    const container = document.querySelector('.container') || document.body;
    Object.assign(container.style, {
      maxWidth: '750px',
      margin: '40px auto',
      background: '#fff',
      padding: '30px',
      borderRadius: '8px',
      boxShadow: '0 2px 10px rgba(0,0,0,0.05)',
      boxSizing: 'border-box'
    });
  

    document.querySelectorAll('h1, h2').forEach(el => {
      Object.assign(el.style, {
        color: '#007BFF',
        borderBottom: '2px solid #007BFF',
        paddingBottom: '5px',
        marginBottom: '20px'
      });
    });

    document.querySelectorAll('a').forEach(link => {
      link.style.color = '#007BFF';
      link.style.textDecoration = 'none';
      link.addEventListener('mouseenter', () => link.style.textDecoration = 'underline');
      link.addEventListener('mouseleave', () => link.style.textDecoration = 'none');
    });

    document.querySelectorAll('ul li a').forEach(link => {
      Object.assign(link.style, {
        display: 'block',
        padding: '10px',
        borderBottom: '1px solid #eee'
      });
      link.addEventListener('mouseenter', () => link.style.backgroundColor = '#f9f9f9');
      link.addEventListener('mouseleave', () => link.style.backgroundColor = '');
    });
  
    window.addEventListener('message', (event) => {
        const message = event.data;
        if (typeof message !== 'string') return;
        let output = document.getElementById('idtest');
        
        if (!output) {
          output = document.createElement('div');
          output.id = 'idtest';
          document.body.appendChild(output);
        }
      
        output.innerHTML = message;
      });
      
    document.querySelectorAll('input, textarea').forEach(el => {
      Object.assign(el.style, {
        width: '100%',
        padding: '10px',
        margin: '10px 0',
        borderRadius: '4px',
        border: '1px solid #ccc',
        fontSize: '1em',
        boxSizing: 'border-box'
      });
    });
  
    const styleButton = (btn, bg = '#007BFF', hover = '#0056b3') => {
      Object.assign(btn.style, {
        display: 'inline-block',
        padding: '8px 16px',
        fontSize: '0.95em',
        backgroundColor: bg,
        color: '#fff',
        border: 'none',
        borderRadius: '4px',
        marginRight: '10px',
        cursor: 'pointer',
        transition: 'background-color 0.3s ease',
        textDecoration: 'none'
      });
      btn.addEventListener('mouseenter', () => btn.style.backgroundColor = hover);
      btn.addEventListener('mouseleave', () => btn.style.backgroundColor = bg);
    };
  

    document.querySelectorAll('button, .edit-btn, .delete-btn, a[href="index.php"], a.btn').forEach(btn => {
      const isLogout = btn.classList.contains('logout') || btn.textContent.toLowerCase().includes('đăng xuất');
      styleButton(btn, isLogout ? '#dc3545' : '#007BFF', isLogout ? '#a71d2a' : '#0056b3');
    });
  

    document.querySelectorAll('textarea').forEach(textarea => {
      const counter = document.createElement('div');
      Object.assign(counter.style, {
        textAlign: 'right',
        fontSize: '0.9em',
        color: '#666'
      });
      textarea.parentNode.insertBefore(counter, textarea.nextSibling);
  
      const update = () => counter.textContent = `${textarea.value.length} ký tự`;
      textarea.addEventListener('input', update);
      update();
    });
  

    window.onload = () => {
      document.body.style.opacity = '1';
    };
  });
  