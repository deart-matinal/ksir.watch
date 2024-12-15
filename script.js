// 解析视频链接
document.getElementById('link').onclick = function() {
    document.getElementById('output').style.display = 'block';
};

document.getElementById('copyButtonA').onclick = function() {
    var inputA = document.getElementById('inputA').value;
    var fullUrlA = "https://jx.xmflv.com/?url=" + inputA;

    navigator.clipboard.writeText(fullUrlA).then(function() {
        alert('正在使用解析链接1,完整视频链接已复制到剪贴板：' + fullUrlA);
    }, function(err) {
        alert('复制失败！请手动复制：' + fullUrlA);
    });
};

document.getElementById('redirectButtonA').onclick = function() {
    var inputA = document.getElementById('inputA').value;
    var fullUrlA = "https://jx.xmflv.com/?url=" + inputA; // 生成链接
    window.location.href = fullUrlA; // 跳转至生成的链接
};

document.getElementById('copyButtonB').onclick = function() {
    var inputB = document.getElementById('inputB').value;
    var fullUrlB = "https://jx.xmflv.cc/?url=" + inputB;

    navigator.clipboard.writeText(fullUrlB).then(function() {
        alert('正在使用解析链接2,完整视频链接已复制到剪贴板：' + fullUrlB);
    }, function(err) {
        alert('复制失败！请手动复制：' + fullUrlB);
    });
};

document.getElementById('redirectButtonB').onclick = function() {
    var inputB = document.getElementById('inputB').value;
    var fullUrlB = "https://jx.xmflv.cc/?url=" + inputB; // 生成链接
    window.location.href = fullUrlB; // 跳转至生成的链接
};

window.onload = function() {
    // 为背景添加加载后的效果
    const background = document.querySelector('.background');
    background.classList.add('clear');

    // 添加景深动画效果
    setTimeout(() => {
        background.classList.add('loaded');
    }, 500); // 等待背景图加载一段时间后应用景深效果
};