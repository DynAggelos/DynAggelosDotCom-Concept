// Immediately Invoked Function Expression
(function() {
    document.addEventListener('DOMContentLoaded', function() {
        // Login Button Click Event (Ignore Exceptions)
        try
        {
            document.getElementById('login-button').addEventListener('click', function() {
                var loginWindow = document.getElementById('login-window');
                var loginMask = document.createElement('div');
                var header = document.querySelector('header');

                if (loginWindow.className.includes('hidden'))
                {
                    // Display Login Window
                    loginWindow.className =
                        loginWindow.className.replace('hidden', 'visible');

                    // Create the Login Mask (Fills Screen to Capture Clicks)
                    loginMask.id = 'login-mask';
                    document.body.insertBefore(loginMask, header);

                    // Login Mask Click Event (Fills Screen Invisibly)
                    document.getElementById('login-mask').addEventListener('click', function() {
                        var loginWindow = document.getElementById('login-window');
                        loginWindow.className =
                            loginWindow.className.replace('visible', 'hidden');
                        document.getElementById('login-mask').outerHTML = '';
                    });
                }
                else
                {
                    // Hide Login Window
                    loginWindow.className =
                        loginWindow.className.replace('visible', 'hidden');

                    // Remove Login Mask
                    document.getElementById('login-mask').outerHTML = '';
                }
            });
        }
        catch(Error)
        {
            // Do Nothing
        }

        // Settings Button Click Event (Ignore Exceptions)
        try
        {
            document.getElementById('settings-button').addEventListener('click', function() {
                var settingsWindow = document.getElementById('settings-window');
                var settingsMask = document.createElement('div');
                var header = document.querySelector('header');

                if (settingsWindow.className.includes('hidden'))
                {
                    // Display Settings Window
                    settingsWindow.className =
                        settingsWindow.className.replace('hidden', 'visible');

                    // Create the Settings Mask (Fills Screen to Capture Clicks)
                    settingsMask.id = 'settings-mask';
                    document.body.insertBefore(settingsMask, header);

                    // Settings Mask Click Event (Fills Screen Invisibly)
                    document.getElementById('settings-mask').addEventListener('click', function() {
                        var settingsWindow = document.getElementById('settings-window');
                        settingsWindow.className =
                            settingsWindow.className.replace('visible', 'hidden');
                        document.getElementById('settings-mask').outerHTML = '';
                    });
                }
                else
                {
                    // Hide Settings Window
                    settingsWindow.className =
                        settingsWindow.className.replace('visible', 'hidden');

                    // Remove Settings Mask
                    document.getElementById('settings-mask').outerHTML = '';
                }
            });
        }
        catch(Error)
        {
            // Do Nothing
        }
    });
})();

/* Reusable Functions */
function useAlert(message, waitForDOM)
{
    if (waitForDOM)
    {
        document.addEventListener('DOMContentLoaded', function()
            {
                alert(message);
            });
    }
    else
    {
        alert(message);
    }
}

function alterContent(
    contentID,
    alterationMethod,
    newContent,
    oldContent)
{
    // Make Changes Only After DOM Content Loads
    document.addEventListener("DOMContentLoaded", function(event)
        {
            var content = document.getElementById(contentID);
            var regEx = new RegExp(oldContent, 'gi');

            if (alterationMethod == 'replace')
            {
                content.outerHTML = newContent;
            }
            else if(alterationMethod == 'append')
            {
                content.outerHTML += newContent;
            }
            else if(alterationMethod == 'prepend')
            {
                content.outerHTML = newContent + content.outerHTML;
            }
            else if(alterationMethod == 'replace inside')
            {
                content.textContent = newContent;
            }
            else if(alterationMethod == 'append inside')
            {
                content.textContent += newContent;
            }
            else if(alterationMethod == 'prepend inside')
            {
                content.textContent = newContent + content.textContent;
            }
            else if(alterationMethod == 'class replace')
            {
                content.className = newContent;
            }
            else if(alterationMethod == 'class append')
            {
                content.className += newContent;
            }
            else if(alterationMethod == 'class replace specific')
            {
                content.className = content.className.replace(regEx, newContent);
            }
            else if(alterationMethod == 'style replace')
            {
                content.style.cssText = newContent;
            }
            else if(alterationMethod == 'style append')
            {
                content.style.cssText += newContent;
            }
            else if(alterationMethod == 'style replace specific')
            {
                content.style.cssText = content.style.cssText.replace(regEx, newContent);
            }
        });
}
