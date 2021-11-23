document.addEventListener('DOMContentLoaded', function() {
  let labelIdle = `<div class="file-input__text"><span>Прикрепите файл</span> с опросным листом с устройства или перетяните его в это поле</div>`;
  
  const iconFile = `
  <svg width="34" height="44" viewBox="0 0 34 44" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M33.9601 0H0V43.7522H33.9601V0Z" fill="#025BFF"/>
    <path d="M3.34839 29.4116C4.11438 29.2816 5.02501 29.1855 6.02243 29.1855C7.82986 29.1855 9.11657 29.6535 9.96934 30.5443C10.8372 31.434 11.3428 32.6955 11.3428 34.4578C11.3428 36.2371 10.851 37.6932 9.94041 38.6958C9.02978 39.7155 7.52673 40.2661 5.63252 40.2661C4.73572 40.2661 3.98357 40.2163 3.34839 40.1361V29.4116ZM4.60617 39.0507C4.92439 39.1164 5.38725 39.1334 5.87904 39.1334C8.56818 39.1334 10.0285 37.4501 10.0285 34.5077C10.0423 31.9347 8.74175 30.3013 6.08154 30.3013C5.43127 30.3013 4.93948 30.3669 4.60617 30.4459V39.0507Z" fill="white"/>
    <path d="M21.7397 34.601C21.7397 38.354 19.7009 40.3435 17.2142 40.3435C14.6408 40.3435 12.8334 38.1121 12.8334 34.8112C12.8334 31.3499 14.7565 29.0857 17.3589 29.0857C20.0178 29.0869 21.7397 31.3657 21.7397 34.601ZM14.1779 34.7796C14.1779 37.1082 15.3049 39.195 17.2859 39.195C19.2808 39.195 20.409 37.1411 20.409 34.6654C20.409 32.4984 19.3965 30.233 17.2998 30.233C15.2181 30.2342 14.1779 32.3854 14.1779 34.7796Z" fill="white"/>
    <path d="M30.6171 39.8097C30.1542 40.0685 29.2298 40.3274 28.0437 40.3274C25.2967 40.3274 23.2289 38.3865 23.2289 34.8123C23.2289 31.4009 25.2967 29.0869 28.3179 29.0869C29.5329 29.0869 30.2989 29.3774 30.6309 29.5718L30.3265 30.7203C29.8498 30.4614 29.1706 30.267 28.3606 30.267C26.0752 30.267 24.5584 31.9004 24.5584 34.7637C24.5584 37.4325 25.9319 39.1473 28.3028 39.1473C29.07 39.1473 29.8498 38.9687 30.3567 38.694L30.6171 39.8097Z" fill="white"/>
    <path d="M33.9999 8.50757H25.2222V0L33.9999 8.50757Z" fill="white"/>
  </svg>`;

  const iconRemove = `
  <svg class="file-input__icon" fill="none" aria-hidden="true" width="26" height="26" viewBox="0 0 26 26" xmlns="http://www.w3.org/2000/svg">
    <rect x="0.5" y="3" width="16" height="4" rx="2" stroke="#999999"/>
    <path d="M2.5 7H14.5V18.5C14.5 19.3284 13.8284 20 13 20H4C3.17157 20 2.5 19.3284 2.5 18.5V7Z" stroke="#999999"/>
    <path d="M5.5 17.5C5.77619 17.5 6 17.2628 6 16.9701V11.0299C6 10.7372 5.77619 10.5 5.5 10.5C5.22381 10.5 5 10.7372 5 11.0299V16.9701C5 17.2628 5.22381 17.5 5.5 17.5Z" fill="#999999"/>
    <path d="M8.5 17.5C8.77619 17.5 9 17.2628 9 16.9701V11.0299C9 10.7372 8.77619 10.5 8.5 10.5C8.22381 10.5 8 10.7372 8 11.0299V16.9701C8.00476 17.2628 8.22857 17.5 8.5 17.5Z" fill="#999999"/>
    <path d="M11.5 17.5C11.7762 17.5 12 17.2628 12 16.9701V11.0299C12 10.7372 11.7762 10.5 11.5 10.5C11.2238 10.5 11 10.7372 11 11.0299V16.9701C11 17.2628 11.2238 17.5 11.5 17.5Z" fill="#999999"/>
    <path d="M11.2716 2.35195C11.3581 2.56077 11.4205 2.77819 11.458 3H8.5L5.54196 3C5.57945 2.77819 5.64187 2.56077 5.72836 2.35195C5.87913 1.98797 6.1001 1.65726 6.37868 1.37868C6.65726 1.1001 6.98797 0.879125 7.35195 0.728361C7.71593 0.577597 8.10603 0.5 8.5 0.5C8.89397 0.5 9.28407 0.577597 9.64805 0.728361C10.012 0.879125 10.3427 1.1001 10.6213 1.37868C10.8999 1.65726 11.1209 1.98797 11.2716 2.35195Z" stroke="#999999"/>
  </svg>`;
  
  let Item = (text, id) => (
    `<div class="file-input__file" id="${id}">
      <div class="file-input__file-left">
        
        <div class="file-input__file-icon">${iconFile}</div>
         
        <span class="file-input__list-text">${text.length > 25? text.slice(0, 25) + '...' : text}</span>
      </div>     
      <div class="file-input__file-icon-wrap"> 
        ${iconRemove}
      </div>
    </div>`
  );
  

  
  if (document.querySelectorAll('.file-input').length > 0) {
    document.querySelectorAll('.file-input').forEach(item => {
      const fileInput = item.querySelector('input[type="file"]');
      const labelText = item.querySelector('.file-input-text-wrap')?.innerHTML;
      let container = item;
      
      // если есть .file-input-text-wrap, то его внутренности используются для лейбла
      labelIdle = labelText ? labelText : labelIdle;
  
      if (container) {
    
        const input = FilePond.create(fileInput, {
          labelIdle,
          maxFiles: 2,
        });
      
        const root = container.querySelector('.filepond--root');
        if (!root)
          return false;
        
        root.addEventListener('FilePond:addfile', e => {
          const fileWrapper = container.closest('.file-input__file-wrap');
          const html = !fileWrapper ?
            `<div class="file-input__file-wrap">${Item(e.detail.file.filename, e.detail.file.id)}</div>` :
            Item(e.detail.file.filename, e.detail.file.id);
          
          container.insertAdjacentHTML("afterbegin", html);
          // container = container.querySelector('.file-input__file-wrap');
        })
        
        container.addEventListener('click', (event) => {
          if (event.target.closest('.file-input__icon')) {
            const fileContainer = event.target.closest('.file-input__file');
            const fileId = fileContainer.getAttribute('id');
            input.removeFile(fileId);
            fileContainer.remove();
          }
        });

      }
    });
  }
  
  
});